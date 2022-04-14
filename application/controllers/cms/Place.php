<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Place extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
        $this->session->set_userdata('func', 'place');
        // if ($this->session->isLogedIn == false) {
        //     redirect('login');
        // }
        // $this->session->set_userdata('tree', 'master');
    }
    public function index()
    {
        if($this->session->role == 2){
            $data['place'] = $this->M_templates->view_where('place',['id'=>$this->session->place_id])->row();
            $this->load->view('cms/place/place', $data);
        }elseif($this->session->role == 1){
            $data['place'] = $this->M_templates->view('place')->result();
            $this->load->view('cms/place/index', $data);
        }
    }
    public function detail($id)
    {
        $data['place'] = $this->M_templates->view_where('place', ['id' => $id])->row();
        $data['type'] = $this->M_templates->view_where('field', ['place_id' => $id])->result();
        $data['price'] = $this->M_templates->query("SELECT price.*,field.name FROM price JOIN field ON field.id=price.field_id WHERE place_id = $id")->result();
        $this->load->view('cms/place/detail', $data);
    }
}