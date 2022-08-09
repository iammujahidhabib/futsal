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
        $data['article'] = $this->M_templates->query("SELECT * FROM article ORDER BY date DESC")->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/artikel',$data);
        $this->load->view('corporate/footer');
    }
    public function detail($id)
    {
        $data['article'] = $this->M_templates->view_where('article',['id'=>$id])->row();
        $user = $this->M_templates->query("SELECT user.role FROM `article` JOIN user ON user.id=article.writer_id WHERE article.id=$id")->row();
        // $_table = "";
        if($user->role == 1){
            $data['writer'] = "Admin";
        }else{
            $writer = $this->M_templates->view_where("user",["id"=>$data['article']->writer_id])->row();
            $data['writer'] = $writer->name;
        }
        $this->load->view('corporate/header');
        $this->load->view('corporate/artikel-detail',$data);
        $this->load->view('corporate/footer');
    }
}
