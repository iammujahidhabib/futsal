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
        $data['place'] = $this->M_templates->view_where('place',['status'=>1])->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/lapangan', $data);
        $this->load->view('corporate/footer');
    }
    public function detail($id)
    {
        $data['place'] = $this->M_templates->view_where('place', ['id' => $id])->row();
        $data['field'] = $this->M_templates->view_where('field', ['place_id' => $id])->result();
        $data['price'] = $this->M_templates->query("SELECT price.*,field.name FROM price 
            RIGHT JOIN field ON field.id=price.field_id 
            WHERE place_id = $id ORDER BY field.id")->result();
        $no = 1;
        $data['rent']= [];
        foreach ($data['field'] as $key) {
            $data['rent']['rent'.$no] = $this->M_templates->query("SELECT *,field.name AS field_name, rent.id AS id FROM rent 
            JOIN field ON field.id=rent.field_id 
            JOIN user ON user.id=rent.user_id  
            WHERE rent.place_id = $id AND rent.field_id = $key->id
            AND rent.status = 1")->result();
            $no++;
        }
        // echo "<pre>";
        // print_r($data);
        $this->load->view('corporate/header');
        $this->load->view('corporate/lapangan-detail', $data);
        $this->load->view('corporate/footer');
    }
}
