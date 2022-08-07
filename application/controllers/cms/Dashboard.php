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
        $id = $this->session->place_id;
        $data['place'] = $this->M_templates->view_where('place', ['id' => $id])->row();
        $data['field'] = $this->M_templates->view_where('field', ['place_id' => $id])->result();
        $data['price'] = $this->M_templates->query("SELECT price.*,field.name FROM price 
            RIGHT JOIN field ON field.id=price.field_id 
            WHERE place_id = $id ORDER BY field.id")->result();
        $no = 1;
        $data['rent'] = [];
        foreach ($data['field'] as $key) {
            $data['rent']['rent' . $no] = $this->M_templates->query("SELECT *,field.name AS field_name, rent.id AS id FROM rent 
            JOIN field ON field.id=rent.field_id 
            JOIN user ON user.id=rent.user_id  
            WHERE rent.place_id = $id AND rent.field_id = $key->id
            AND rent.status = 1")->result();
            $no++;
        }

        $data['place'] = $this->M_templates->view_where('place', ['id' => $this->session->place_id])->row();
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
