<?php

class Tool {
    
    public function parseCategories($cat) {
        $CI =& get_instance();
        $categories = explode(',' , $cat);

        // Load the categories into the session
        $CI->load->model('Letme_model','',TRUE);
        $CI->Letme_model->loadCategories();

        $category = '';
        
        // match up the categories
        foreach ($categories as $k => $v) {
            foreach ($_SESSION['category'] as $catK => $catV) {
                if ($catV['id'] === $v) {
                    $category .= $catV['name'] . ', ';
                    break;
                }
            }
        }
        $category = substr($category,0,-2); // trim the ", " from the end
        echo $category;

    }
}