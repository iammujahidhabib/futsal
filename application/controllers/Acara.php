<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acara extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
    }
    function index()
    {
        $data['event'] = $this->M_templates->view('event')->result();
        $this->load->view('corporate/header');
        $this->load->view('corporate/event',$data);
        $this->load->view('corporate/footer');
    }
    function detail($id)
    {
        $data['event'] = $this->M_templates->view_where('event',['id'=>$id])->row();
        // $data['writer'] = $this->M_templates->view_where('place',['user_id'=>$id])->row();
        $this->load->view('corporate/header');
        $this->load->view('corporate/event-detail',$data);
        $this->load->view('corporate/footer');
    }
}
