<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
    }
    function index()
    {
        $data['place'] = $this->M_templates->view('place')->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/lapangan', $data);
        $this->load->view('corporate/footer');
    }
    public function detail($id)
    {
        $cek_id = $this->M_templates->query("SELECT place_id AS user_id FROM field WHERE id = $id")->row();
        // echo $cek_id->user_id;
        $data['place'] = $this->M_templates->view_where('place', ['id' => $id])->row();
        $data['field'] = $this->M_templates->view_where('field', ['place_id' => $cek_id->user_id])->result();
        $data['price'] = $this->M_templates->query("SELECT price.*,field.name FROM price JOIN field ON field.id=price.field_id WHERE field_id = $cek_id->user_id ORDER BY field.id")->result();
        $data['rent'] = $this->M_templates->query("SELECT *, rent.id AS id FROM rent 
        JOIN field ON field.id=rent.field_id 
        JOIN user ON user.id=rent.user_id  
        WHERE rent.field_id = $id
        AND rent.status = 1")->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/lapangan-detail', $data);
        $this->load->view('corporate/footer');
    }
}
