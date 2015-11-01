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
    
}