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
        $field = $this->M_templates->view_where('place',['id'=>$this->session->place_id])->row();
        $data['rent']=$this->M_templates->query("SELECT *,field.name AS field, rent.id AS id FROM rent 
        JOIN field ON field.id=rent.field_id 
        JOIN user ON user.id=rent.user_id 
        WHERE rent.place_id = $field->id")->result();
        // print_r($field);
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
        $this->M_templates->update("rent",['id'=>$id],['status'=>2,'remark'=>$this->input->post('remark')]);
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
