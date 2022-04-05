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
    public function detail($id)
    {
        $data['article'] = $this->M_templates->view_where('article',['id'=>$id])->row();
        $account = $this->M_templates->query("SELECT account.role FROM `article` JOIN account ON account.id=article.writer_id WHERE article.id=$id")->row();
        // $_table = "";
        if($account->role == 1){
            $data['writer'] = "Admin";
        }else{
            $writer = $this->M_templates->view_where("field",["account_id"=>$data['article']->writer_id])->row();
            $data['writer'] = $writer->name;
        }
        $this->load->view('corporate/header');
        $this->load->view('corporate/artikel-detail',$data);
        $this->load->view('corporate/footer');
    }
}
