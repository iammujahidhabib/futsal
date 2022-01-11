<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
    }
    function index()
    {
        $data['article'] = $this->M_templates->view('article')->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/artikel',$data);
        $this->load->view('corporate/footer');
    }
}
