<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monkeywrench extends CI_Controller {

    public function index()	{
        $this->load->view('hair');
        $this->load->view('thought');
        $this->load->view('sole');
    }
    
    public function used_tools() {
        $this->load->model('Monkeywrench_model');
        $data['tools'] = $this->Monkeywrench_model->getActiveTools();
        $this->load->view('hair');
        $this->load->view('used_tools',$data);
        $this->load->view('sole');
    }
    
    public function parseCategory() {
        $categories = explode(',' , $this->input->post('category'));

        // Load the categories into the session
        $this->load->model('Letme_model');
        $this->Letme_model->loadCategories();

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
