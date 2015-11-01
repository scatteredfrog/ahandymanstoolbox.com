<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monkeywrench_model extends CI_Model {

    public function getActiveTools() {
        $data['tool'] = array();
        $this->db->select('id,name,category,purchase_price,public_notes,public_misc,picture_filename');
        $this->db->from('tool_db');
        $this->db->where('active','1');
        $query = $this->db->get();
        $result_count = 0;
        $tool = array();
        foreach($query->result() as $row) {
            $tool[$result_count]['id'] = $row->id;
            $tool[$result_count]['name'] = $row->name;
            $tool[$result_count]['category'] = $row->category;
            $tool[$result_count]['purchase_price'] = $row->purchase_price;
            $tool[$result_count]['notes'] = $row->public_notes;
            $tool[$result_count]['misc'] = $row->public_misc;
            $tool[$result_count]['picture'] = $row->picture_filename;
            $result_count++;
        }
        return $tool;
    }
    
    public function getCategories($categories) {
        
    }
    
}