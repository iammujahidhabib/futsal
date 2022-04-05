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
        $data['field'] = $this->M_templates->view('field')->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/lapangan', $data);
        $this->load->view('corporate/footer');
    }
    public function detail($id)
    {
        $cek_id = $this->M_templates->query("SELECT account_id FROM field WHERE id = $id")->row();
        // echo $cek_id->account_id;
        $data['field'] = $this->M_templates->view_where('field', ['id' => $id])->row();
        $data['type_field'] = $this->M_templates->view_where('type_field', ['field_id' => $cek_id->account_id])->result();
        $data['price'] = $this->M_templates->query("SELECT price.*,type_field.type FROM price JOIN type_field ON type_field.id=price.type_field_id WHERE field_id = $cek_id->account_id ORDER BY type_field.id")->result();
        $data['rent'] = $this->M_templates->query("SELECT *, rent.id AS id FROM rent 
        JOIN type_field ON type_field.id=rent.field_type_id 
        JOIN account ON account.id=rent.account_id 
        JOIN player ON account.id=player.account_id 
        WHERE rent.field_id = $id
        AND rent.status = 1")->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/lapangan-detail', $data);
        $this->load->view('corporate/footer');
    }
}
