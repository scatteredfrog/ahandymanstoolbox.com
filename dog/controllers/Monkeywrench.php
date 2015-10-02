<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monkeywrench extends CI_Controller {

    public function index()	{
        $this->load->view('hair');
        $this->load->view('thought');
        $this->load->view('sole');
    }
}
