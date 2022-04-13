<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
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
        $field = $this->M_templates->view_where('place',['user_id'=>$this->session->id])->row();
        $data['rent']=$this->M_templates->query("SELECT *, rent.id AS id FROM rent 
        JOIN field ON field.id=rent.field_id 
        JOIN user ON user.id=rent.user_id 
        WHERE rent.field_id = $field->id")->result();
        // print_r($data);
        $this->load->view('cms/rent/index', $data);
    }
    public function accept($id)
    {
        $this->M_templates->update("rent",['id'=>$id],['status'=>1]);
        redirect('cms/booking');
    }
    public function selesai($id)
    {
        $this->M_templates->update("rent",['id'=>$id],['status'=>4]);
        redirect('cms/booking');
    }
    public function delete($id)
    {
        $this->M_templates->update("rent",['id'=>$id],['status'=>2]);
        redirect('cms/booking');
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
