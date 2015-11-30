<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letme extends CI_Controller {

    public function index() {
        $this->load->view('hair');
        $this->load->view('letmedostuff');
        $this->load->view('sole');
    }

    public function usetheform() {
        $this->load->model('Letme_model');
        $this->Letme_model->loadCategories();
        $data['entered_this_year'] = $this->Letme_model->rowsThisYear();
        $data['stock_suffix'] = date('y') % 10;
        $this->load->view('use_the_form',$data);
    }

    public function seethetools() {
        $this->load->model('Letme_model');
        $data['tools'] = $this->Letme_model->quickieToolReport();
        $this->load->view('zenith');
        $this->load->view('seethetools', $data);
        $this->load->view('nadir');
    }
    
    public function uploadapicture() {
        $status = '';
        $msg = '';
        $file_element_name = 'picture';

        if ($status !== 'error') {
            $config['upload_path'] = 'stuff/images/tool_photos/';
            $config['allowed_types'] = 'gif|jpeg|png|jpg';
            $config['max_size'] = 1024 * 50;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('','');
            } else {
                $data = $this->upload->data();
                $image_path = $data['full_path'];
                if (file_exists($image_path)) {
                    $status = 'success';
                    $msg = 'Main picture "' . $_FILES[$file_element_name]['name'] . '" successfully uploaded';
                } else {
                    $status = 'error';
                    $msg = 'There was a problem saving the main picture.';
                }
            }
            @unlink($_FILES[$file_element_name]);
            
            $file_element_name = 'thumbnail';
            if ((strlen($_FILES[$file_element_name]['name']) > 0) && !$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg .= $this->upload->display_errors('','');
            } else if (strlen($_FILES[$file_element_name]['name']) > 0) {
                $data = $this->upload->data();
                $image_path = $data['full_path'];
                if (file_exists($image_path)) {
                    $status = 'success';
                    $msg .= 'Thumbnail successfully uploaded';
                } else {
                    $status = 'error';
                    $msg .= 'There was a problem saving the thumbnail.';
                }
            }
            if ($status === 'success') {
                echo "<br><pre>Post stuff:" . print_r($_POST,1);
                $toolToInsert = array(
                    'picture_filename' => $_FILES['picture']['name'],
                    'name' => $this->input->post('name'),
                    'purchase_price' => $this->input->post('purchase_price'),
                    'public_notes' => $this->input->post('public_notes'),
                    'public_misc' => $this->input->post('public_misc'),
                    'purchased_from' => $this->input->post('purchased_from'),
                    'private_purchase_date' => $this->input->post('private_purchase_date'),
                    'private_purchase_price' => $this->input->post('private_purchase_price'),
                    'purchase_location' => $this->input->post('purchase_location'),
                    'sold_by' => $this->input->post('sold_by'),
                    'date_sold' => $this->input->post('date_sold'),
                    'sale_price' => $this->input->post('sale_price'),
                    'sold_to_name' => $this->input->post('sold_to_name'),
                    'sold_to_phone' => $this->input->post('sold_to_phone'),
                    'sold_to_email' => $this->input->post('sold_to_email'),
                    'private_notes' => $this->input->post('private_notes'),
                    'private_misc' => $this->input->post('private_notes'),
                    'entered_this_year' => $this->input->post('entered_this_year'),
                    'year_entered' => date('Y')
                 );

                if (isset($_FILES['thumbnail']['name'])) {
                    $toolToInsert['thumbnail_filename'] = $_FILES['thumbnail']['name'];
                }
                foreach($_POST as $pKey => $pVal) {
                    if (substr($pKey,0,9) === 'category_') {
                        error_log("Found a category: ".print_r($pVal,1)." for key of ".print_r($pKey,1));
                        $post_category[] = substr($pKey,9);
                    }
                }
                if (isset($post_category)) {
                    $toolToInsert['category'] = implode(',',$post_category);
                }
                
                if (isset($_POST['active'])) {
                    $toolToInsert['active'] = 1;
                }
                $this->load->model('Letme_model');
                $result = $this->Letme_model->insertTool('tool_db',$toolToInsert);
                echo "Result: \n";
                echo print_r($result,1);
            }

        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function addacategory() {
        $returnData = array('success' => true);
        $category = $this->input->post('category',TRUE);
        foreach($_SESSION['category'] as $cat_key => $cat_value) {
            if (strtoupper($category) === strtoupper($cat_value['name'])) {
                $returnData['success'] = false;
                $returnData['error'] = $cat_value['name'] . ' is already a category.';
                break;
            }
        }
        if ($returnData['success']) {
            $this->load->model('letme_model');
            $insert_data = array('category' => $category);
            if (!$this->letme_model->insertTool('lf_tool_form_category', $insert_data)) {
                $returnData['success'] = false;
                $returnData['error'] = 'There was a problem adding this to the database.';
            }
        }
        echo json_encode($returnData);
    }

    public function add_a_tool() {
        $status = '';
        $msg = '';
        $file_element_name = 'picture';

        if ($status !== 'error') {
            $config['upload_path'] = 'stuff/images/tool_photos/';
            $config['allowed_types'] = 'gif|jpeg|png|jpg';
            $config['max_size'] = 1024 * 50;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload($file_element_name) && $_FILES[$file_element_name]['name']) {
                $status = 'error';
                $msg = $this->upload->display_errors('','');
            } else {
                if (isset($_FILES[$file_element_name]['name'])) {
                    $data = $this->upload->data();
                    $image_path = $data['full_path'];
                    if (file_exists($image_path)) {
                        $status = 'success';
                        $msg = 'Main picture "' . $_FILES[$file_element_name]['name'] . '" successfully uploaded';
                        list($width, $height, $type, $attr) = getimagesize($image_path);
                        if ($height > 400) {
                            echo '<br />Resizing image...<br />';
                            $resized_file_name = $this->resize_image($image_path);
                            if ($resized_file_name) {
                                echo 'Image path: ' . $image_path;
                            }
                        }
                        $first_picture = $resized_file_name ? $resized_file_name : $_FILES['picture']['name'];
                    } else {
                        $status = 'error';
                        $msg = 'There was a problem saving the main picture.';
                    }
                }
            }
            if (isset($_FILES[$file_element_name])) {
                @unlink($_FILES[$file_element_name]);
            }

            for ($x = 1; $x < 20; $x++) {
                $file_element_name = 'more_pictures' . $x;
                if ($_FILES[$file_element_name]['name']) {
                    if ($file_element_name) {
                        if (!$this->upload->do_upload($file_element_name)) {
                            $status = 'error';
                            $msg = 'File name: ' . $_FILES[$file_element_name]['name'] . '<br />' . $this->upload->display_errors('', '');
                        } else {
                            $data = $this->upload->data();
                            $image_path = $data['full_path'];
                            if (file_exists($image_path)) {
                                $status = 'success';
                                $msg = 'Picture "' . $_FILES[$file_element_name]['name'] . '" successfully uploaded';
                            } else {
                                $status = 'error';
                                $msg = 'There was a problem saving picture &num; ' . $x + 1 . '.';
                            }
                        }
                        @unlink($_FILES[$file_element_name]);
                    }
                }
            }

            if ($status !== 'error') {
                $button_pressed['submit'] = $this->input->post('submit');
                $button_pressed['submit_add'] = $this->input->post('submit_add');
                $toolToInsert = array(
                    'stock' => $this->input->post('stock'),
                    'picture_filename' => $first_picture,
                    'name' => $this->input->post('name'),
                    'craigslist_title' => $this->input->post('cl_title'),
                    'ebay_title' => $this->input->post('ebay_title'),
                    'purchase_date' => $this->input->post('purchase_date'),
                    'purchase_price' => $this->input->post('purchase_price'),
                    'buyers_premium' => $this->input->post('buyers_premium'),
                    'purchased_from' => $this->input->post('purchased_from'),
                    'public_notes' => $this->input->post('public_notes'),
                    'public_misc' => $this->input->post('public_misc'),
                    'price_tag' => $this->input->post('price_tag'),
                    'item_details' => $this->input->post('item_details'),
                    'sale_price' => $this->input->post('sale_price'),
                    'date_sold' => $this->input->post('sold_date_month') . '/' . $this->input->post('date_sold') . '/' . $this->input->post('sold_date_year'),
                    'sold_by' => $this->input->post('sold_by'),
                    'sold_to_name' => $this->input->post('sold_to_name'),
                    'sold_to_phone' => $this->input->post('sold_to_phone'),
                    'sold_to_email' => $this->input->post('sold_to_email'),
                    'commission' => $this->input->post('commisssion'),
                    'shipping' => $this->input->post('shipping'),
                    'other_costs' => $this->input->post('other_costs'),
                    'profit_loss' => $this->input->post('profit_loss'),
                    'private_notes' => $this->input->post('private_notes'),
                    'private_misc' => $this->input->post('private_notes'),
                    'action_needed' => $this->input->post('action_needed'),
                    'notes_for_sean' => $this->input->post('notes_for_sean'),
                    'year_entered' => date('Y'),
                    'entered_this_year' => $this->input->post('entered_this_year')
                );

                for ($x = 1; $x < 20; $x++) {
                    if ($_FILES['more_pictures' . $x]['name']) {
                        $toolToInsert['picture_filename' . $x] = $_FILES['more_pictures' . $x]['name'];
                    }
                }

                foreach($_POST as $pKey => $pVal) {
                    if (substr($pKey,0,9) === 'category_') {
                        $post_category[] = substr($pKey,9);
                    }
                }
                if (isset($post_category)) {
                    $toolToInsert['category'] = implode(',',$post_category);
                }

                // checkbox handling
                if (isset($_POST['display_info'])) {
                    $toolToInsert['display_info'] = 1;
                };

                if (isset($_POST['active'])) {
                    $toolToInsert['active'] = 1;
                }

                $this->load->model('Letme_model');
                $result = $this->Letme_model->insertTool('tool_db',$toolToInsert);
            
                if ($result['status'] === 'success') {
                    if ($button_pressed['submit_add']) {
                        $this->load->view('use_the_form', array('success' => 'success'));
                    } else {
                        echo 'Success! (Rich, this is just a placeholder; redirect to be added soon)';
                    }
                }
            }

        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }
    
    public function edit_tools() {
        $this->load->model('Letme_model');
        $this->Letme_model->loadCategories();
        $this->load->library('tool');
        $data['tools'] = $this->Letme_model->getTools();
        $this->load->view('edit_tools',$data);
    }
    
    public function toggleActiveTool() {
        $tool_id = $this->input->post('tool_id');
        $this->load->model('Letme_model');
        $updateIt = $this->Letme_model->toggleActive($tool_id);
        if ($updateIt) {
            echo "success";
        } else {
            echo "fail";
        }
    }
    
    public function deleteTool() {
        $tool_id = $this->input->post('tool_id');
        $this->load->model('Letme_model');
        if ($this->Letme_model->deleteTool($tool_id)) {
            echo "success";
        } else {
            echo "fail";
        }
    }
    
    public function editTool() {
        $this->load->model('Letme_model');
        $edit_data['id'] = $this->input->post('id');
        $edit_data['name'] = $this->input->post('name');
        $edit_data['stock'] = $this->input->post('stock');
        $edit_data['category'] = $this->input->post('category');
        $edit_data['craigslist_title'] = $this->input->post('craigslist_title');
        $edit_data['ebay_title'] = $this->input->post('ebay_title');
        $edit_data['purchase_date'] = $this->input->post('purchase_date');
        $edit_data['purchase_price'] = $this->input->post('purchase_price');
        $edit_data['buyers_premium'] = $this->input->post('buyers_premium');
        $edit_data['purchased_from'] = $this->input->post('purchased_from');
        $edit_data['display_info'] = $this->input->post('display_info');
        $edit_data['price_tag'] = $this->input->post('price_tag');
        $edit_data['public_notes'] = $this->input->post('public_notes');
        $edit_data['public_misc'] = $this->input->post('public_misc');
        $edit_data['sale_price'] = $this->input->post('sale_price');
        $edit_data['date_sold'] = $this->input->post('date_sold');
        $edit_data['sold_to_name'] = $this->input->post('sold_to_name');
        $edit_data['sold_to_phone'] = $this->input->post('sold_to_phone');
        $edit_data['sold_to_email'] = $this->input->post('sold_to_email');
        $edit_data['sold_by'] = $this->input->post('sold_by');
        $edit_data['commission'] = $this->input->post('commission');
        $edit_data['shipping'] = $this->input->post('shipping');
        $edit_data['other_costs'] = $this->input->post('other_costs');
        $edit_data['profit_loss'] = $this->input->post('profit_loss');
        $edit_data['private_notes'] = $this->input->post('private_notes');
        $edit_data['private_misc'] = $this->input->post('private_misc');
        $edit_data['action_needed'] = $this->input->post('action_needed');
        $edit_data['notes_for_sean'] = $this->input->post('notes_for_sean');
        return $this->Letme_model->editTool($edit_data);
    }
    
    public function do_resize() {
        $this->resize_image('stuff/images/tool_photos/IMG_3039.JPG');
    }
    
    public function resize_image($source_image) {
        $config['image_library'] = 'gd2';
        $config['height'] = 400;
        $config['source_image'] = $source_image;
        $image_parts = explode('.', $source_image);
        $ext_pos = strrpos($source_image, '.');
        $config['new_image'] = substr($source_image, 0, $ext_pos) . '_resized' . substr($source_image, $ext_pos);
        $this->load->library('image_lib', $config);
        $slash_pos = strrpos($config['new_image'], '/') + 1;
        $new_filename = substr($config['new_image'], $slash_pos);
        echo "New image: " . $config['new_image'] . '<br />';
        echo 'New filename: ' . $new_filename . '<br />';
        if ($this->image_lib->resize()) {
            return $new_filename;
        } else {
            return false;
        }
    }
}
