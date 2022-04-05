<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
        $this->session->set_userdata('func', 'dash');
        if ($this->session->isLogin == false) {
            redirect('login');
        }
    }
    public function index()
    {
        if ($this->session->role == 1) {
            redirect("cms/dashboard/admin");
        } elseif ($this->session->role == 2) {
            redirect("cms/dashboard/field");
        } else {
            redirect("login/logout");
        }
    }
    public function admin()
    {
        $data = [];
        $this->load->view('cms/dashboard/admin', $data);
    }
    public function field()
    {
        $data = [];
        $this->load->view('cms/dashboard/field', $data);
    }
    public function school()
    {
        $data = [];
        $this->load->view('cms/dashboard/school', $data);
    }
    public function eventorganizer()
    {
        $data = [];
        $this->load->view('cms/dashboard/eventorganizer', $data);
    }
}
