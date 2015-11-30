<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letme_model extends CI_Model {
    
    public function insertTool($table, $tool_data) {
        $success = $this->db->insert($table, $tool_data);
        return $success;
    }
    
    public function loadCategories() {
        $this->db->select('id,category');
        $query = $this->db->get('lf_tool_form_category');
        if (isset($_SESSION['category'])) {
            unset($_SESSION['category']);
        }
        $x = 0;
        foreach ($query->result() as $row) {
            $_SESSION['category'][$x]['name'] = $row->category;
            $_SESSION['category'][$x]['id'] = $row->id;
            $x++;
        }

      $x=0;
    }
    
    public function quickieToolReport() {
        $this->load->library('table');
        $template = array(
            'table_open' => '<table border="1" cellpadding="4" cellspacing="0">',
        );
        $this->table->set_template($template);
        $this->db->select('name,stock,purchase_price,public_notes,public_misc,picture_filename');
        $this->db->from('tool_db');
        $query = $this->db->get();
        $tool = $this->table->generate($query);
        return $tool;
    }
    
    public function rowsThisYear() {
        $this_year = date('Y');
        $sql = 'SELECT id FROM tool_db WHERE year_entered=' . $this_year;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    public function getTools() {
        $toolf = 'stock,name,craigslist_title,ebay_title,category,display_info,public_notes,';
        $toolf .= 'public_misc,active,price_tag,item_details,buyers_premium,purchased_from,';
        $toolf .= 'purchase_date,purchase_price,sold_by,commission,shipping,other_costs,';
        $toolf .= 'profit_loss,date_sold,sale_price,sold_to_name,sold_to_phone,sold_to_email,';
        $toolf .= 'private_notes,private_misc,action_needed,notes_for_sean,picture_filename,';
        $toolf .= 'picture_filename1,picture_filename2,picture_filename3,picture_filename4,';
        $toolf .= 'picture_filename5,picture_filename6,picture_filename7,picture_filename8,';
        $toolf .= 'picture_filename9,picture_filename10,picture_filename11,picture_filename12,';
        $toolf .= 'picture_filename13,picture_filename14,picture_filename15,';
        $toolf .= 'picture_filename16,picture_filename17,picture_filename18,';
        $toolf .= 'picture_filename19,id';
        $this->db->select($toolf);
        $this->db->from('tool_db');
        $query = $this->db->get();
        $x = 0;
        foreach ($query->result() as $row) {
            $tool[$x] = $row;
            $x++;
        }
        return $tool;
    }
    
    public function toggleActive($tool_id) {
        $this->db->select('active');
        $this->db->where('id', $tool_id);
        $query = $this->db->get('tool_db');
        foreach($query->result() as $row) {
            $isActive = $row->active;
        }
        $activeSet = $isActive ? '' : '1';
        $this->db->set('active', $activeSet);
        $this->db->where('id', $tool_id);
        return $this->db->update('tool_db');
    }
    
    public function deleteTool($tool_id) {
        return $this->db->delete('tool_db', array('id' => $tool_id));
    }
    
    public function editTool($tool_array) {
        $id = $tool_array['id'];
        unset($tool_array['id']);
        $tool_array['display_info'] = $tool_array['display_info'] === 'y' ? 1 : 0;
        foreach($tool_array as $key => $val) {
            $this->db->set($key, $val);
        }
        $this->db->where('id',$id);
        $this->db->update('tool_db');
    }
}