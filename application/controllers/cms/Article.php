<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
        $this->session->set_userdata('func', 'article');
        // if ($this->session->isLogedIn == false) {
        //     redirect('login');
        // }
        // $this->session->set_userdata('tree', 'master');
    }
    public function index()
    {
        if($this->session->role == 1){
            $data['article'] = $this->M_templates->view('article')->result();
        }else{
            $data['article'] = $this->M_templates->view_where('article',['writer_id'=>$this->session->id])->result();
        }
        $this->load->view('cms/article/index', $data);
    }
    public function create()
    {
        if ($this->input->post()) {
            $config = array(
                'upload_path' => './asset/image/article/',
                'overwrite' => false,
                'remove_spaces' => true,
                'allowed_types' => 'png|jpg|gif|jpeg',
                'max_size' => 10000,
                'xss_clean' => true,
            );
            $this->load->library('upload');
            $this->upload->initialize($config);
            $data = $this->input->post();
            // if ($_FILES['file']['name'] != "") {
            if ($this->upload->do_upload('image')) {
                $file_data = $this->upload->data();
                $data['image'] = $file_data['file_name'];
            } else {
                $data['image'] = "default.png";
            }
            $this->M_templates->insert('article', $data);
            redirect('cms/article');
        } else {
            $this->load->view('cms/article/create');
        }
    }
    public function edit($id)
    {
        $where = ['id' => $id];
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($_FILES['image']['name'] != "") {
                $config = array(
                    'upload_path' => './asset/image/article/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'png|jpg|gif|jpeg',
                    'max_size' => 10000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                // if ($_FILES['file']['name'] != "") {
                if ($this->upload->do_upload('image')) {
                    $file_data = $this->upload->data();
                    $data['image'] = $file_data['file_name'];
                } else {
                    $data['image'] = "default.png";
                }
            }else{
                unset($data['image']);
            }
            $this->M_templates->update('article', $where, $data);
            redirect('cms/article');
        } else {
            $data['article'] = $this->M_templates->view_where('article', $where)->row();
            $this->load->view('cms/article/edit', $data);
        }
    }
    public function delete($id)
    {
        $where = ['id' => $id];
        $this->M_templates->delete('article', $where);
        redirect('cms/article');
    }
}
