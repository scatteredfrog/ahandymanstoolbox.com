<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monkeywrench_model extends CI_Model {

    public function getActiveTools() {
        $data['tool'] = array();
        $ts = 'id,active,name,category,price_tag,craigslist_title,ebay_title,';
        $ts .= 'purchase_date,purchase_price,buyers_premium,public_notes,public_notes,';
        $ts .= 'purchased_from,item_details,public_notes,public_misc,';
        $ts .= 'picture_filename,picture_filename1,picture_filename2,';
        $ts .= 'picture_filename3,picture_filename4,picture_filename5,';
        $ts .= 'picture_filename6,picture_filename7,picture_filename8,';
        $ts .= 'picture_filename9,picture_filename10,picture_filename11,';
        $ts .= 'picture_filename12,picture_filename13,picture_filename14,';
        $ts .= 'picture_filename15,picture_filename16,picture_filename17,';
        $ts .= 'picture_filename18,picture_filename19';
        $this->db->select($ts);
//        $this->db->select('id,name,category,price_tag,purchase_price,public_notes,public_misc,picture_filename');
        $this->db->from('tool_db');
        $this->db->where('active','1');
        $query = $this->db->get();
        $result_count = 0;
        $tool = array();
        foreach($query->result() as $row) {
            $tool[$result_count]['id'] = $row->id;
            $tool[$result_count]['name'] = $row->name;
            $tool[$result_count]['active'] = $row->active;
            $tool[$result_count]['category'] = $row->category;
            $tool[$result_count]['craigslist_title'] = $row->craigslist_title;
            $tool[$result_count]['ebay_title'] = $row->ebay_title;
            $tool[$result_count]['purchase_date'] = $row->purchase_date;
            $tool[$result_count]['purchase_price'] = $row->purchase_price;
            $tool[$result_count]['public_notes'] = $row->public_notes;
            $tool[$result_count]['public_misc'] = $row->public_misc;
            $tool[$result_count]['picture_filename'] = $row->picture_filename;
            $tool[$result_count]['picture_filename1'] = $row->picture_filename1;
            $tool[$result_count]['picture_filename2'] = $row->picture_filename2;
            $tool[$result_count]['picture_filename3'] = $row->picture_filename3;
            $tool[$result_count]['picture_filename4'] = $row->picture_filename4;
            $tool[$result_count]['picture_filename5'] = $row->picture_filename5;
            $tool[$result_count]['picture_filename6'] = $row->picture_filename6;
            $tool[$result_count]['picture_filename7'] = $row->picture_filename7;
            $tool[$result_count]['picture_filename8'] = $row->picture_filename8;
            $tool[$result_count]['picture_filename9'] = $row->picture_filename9;
            $tool[$result_count]['picture_filename10'] = $row->picture_filename10;
            $tool[$result_count]['picture_filename11'] = $row->picture_filename11;
            $tool[$result_count]['picture_filename12'] = $row->picture_filename12;
            $tool[$result_count]['picture_filename13'] = $row->picture_filename13;
            $tool[$result_count]['picture_filename14'] = $row->picture_filename14;
            $tool[$result_count]['picture_filename15'] = $row->picture_filename15;
            $tool[$result_count]['picture_filename16'] = $row->picture_filename16;
            $tool[$result_count]['picture_filename17'] = $row->picture_filename17;
            $tool[$result_count]['picture_filename18'] = $row->picture_filename18;
            $tool[$result_count]['picture_filename19'] = $row->picture_filename19;
            $tool[$result_count]['price_tag'] = $row->price_tag;
            $result_count++;
        }
        $this->db->select($ts);
        $this->db->from('tool_db');
        $this->db->where('active !=','1');
        $query = $this->db->get();
        foreach($query->result() as $row) {
            $tool[$result_count]['id'] = $row->id;
            $tool[$result_count]['name'] = $row->name;
            $tool[$result_count]['active'] = $row->active;
            $tool[$result_count]['category'] = $row->category;
            $tool[$result_count]['craigslist_title'] = $row->craigslist_title;
            $tool[$result_count]['ebay_title'] = $row->ebay_title;
            $tool[$result_count]['purchase_date'] = $row->purchase_date;
            $tool[$result_count]['purchase_price'] = $row->purchase_price;
            $tool[$result_count]['public_notes'] = $row->public_notes;
            $tool[$result_count]['public_misc'] = $row->public_misc;
            $tool[$result_count]['picture_filename'] = $row->picture_filename;
            $tool[$result_count]['picture_filename1'] = $row->picture_filename1;
            $tool[$result_count]['picture_filename2'] = $row->picture_filename2;
            $tool[$result_count]['picture_filename3'] = $row->picture_filename3;
            $tool[$result_count]['picture_filename4'] = $row->picture_filename4;
            $tool[$result_count]['picture_filename5'] = $row->picture_filename5;
            $tool[$result_count]['picture_filename6'] = $row->picture_filename6;
            $tool[$result_count]['picture_filename7'] = $row->picture_filename7;
            $tool[$result_count]['picture_filename8'] = $row->picture_filename8;
            $tool[$result_count]['picture_filename9'] = $row->picture_filename9;
            $tool[$result_count]['picture_filename10'] = $row->picture_filename10;
            $tool[$result_count]['picture_filename11'] = $row->picture_filename11;
            $tool[$result_count]['picture_filename12'] = $row->picture_filename12;
            $tool[$result_count]['picture_filename13'] = $row->picture_filename13;
            $tool[$result_count]['picture_filename14'] = $row->picture_filename14;
            $tool[$result_count]['picture_filename15'] = $row->picture_filename15;
            $tool[$result_count]['picture_filename16'] = $row->picture_filename16;
            $tool[$result_count]['picture_filename17'] = $row->picture_filename17;
            $tool[$result_count]['picture_filename18'] = $row->picture_filename18;
            $tool[$result_count]['picture_filename19'] = $row->picture_filename19;
            $tool[$result_count]['price_tag'] = $row->price_tag;
            $result_count++;
        }
        
        return $tool;
    }
    
    public function getCategories($categories) {
        
    }
    
}