<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letme extends CI_Controller {

    public function index() {
        $this->load->view('welcome_message');
    }

    public function usetheform() {
        $this->load->view('use_the_form');
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
                    'private_misc' => $this->input->post('private_notes')
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
                $result = $this->Letme_model->insertTool($toolToInsert);
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
            if (!$this->letme_model->insertTool($insert_data)) {
                $returnData['success'] = false;
                $returnData['error'] = 'There was a problem adding this to the database.';
            }
        }
        error_log("Return data: " . print_r($returnData,1));
        echo json_encode($returnData);
    }
    
}
