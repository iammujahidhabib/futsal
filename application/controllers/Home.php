<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
    }
    function index()
    {
        $date = date('Y-m-d');
        $data['field'] = $this->M_templates->view('field')->result();
        $data['event'] = $this->M_templates->query("SELECT * FROM event WHERE start >= '$date' LIMIT 3")->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/index', $data);
        $this->load->view('corporate/footer');
    }
}
