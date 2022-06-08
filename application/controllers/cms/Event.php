<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
        $this->session->set_userdata('func', 'event');
        // if ($this->session->isLogedIn == false) {
        //     redirect('login');
        // }
        // $this->session->set_userdata('tree', 'master');
    }
    public function index()
    {
        if($this->session->role == 1){
            $data['event'] = $this->M_templates->view('event')->result();
        }else{
            $data['event'] = $this->M_templates->view_where('event',['place_id'=>$this->session->id])->result();
        }        $this->load->view('cms/event/index', $data);
    }
    public function create()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            // if ($_FILES['file']['name'] != "") {
            $config = array(
                'upload_path' => './asset/image/event/',
                'overwrite' => false,
                'remove_spaces' => true,
                'allowed_types' => 'png|jpg|gif|jpeg',
                'max_size' => 10000,
                'xss_clean' => true,
            );
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('poster')) {
                $file_data = $this->upload->data();
                $data['poster'] = $file_data['file_name'];
            } else {
                $data['poster'] = "default.png";
            }

            if ($_FILES['form']['name'] != "") {
                $config = array(
                    'upload_path' => './asset/form/event/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'doc|docx|pdf',
                    'max_size' => 20000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('form')) {
                    // if ($_FILES['file']['name'] != "") {
                    $file_data = $this->upload->data();
                    $data['form'] = $file_data['file_name'];
                } else {
                    $data['form'] = "default.docx";
                }
            }
            $this->M_templates->insert('event', $data);
            redirect('cms/event');
        } else {
            $this->load->view('cms/event/create');
        }
    }
    public function edit($id)
    {
        $where = ['id' => $id];
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($_FILES['poster']['name'] != "") {
                $config = array(
                    'upload_path' => './asset/image/event/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'png|jpg|gif|jpeg',
                    'max_size' => 10000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                // if ($_FILES['file']['name'] != "") {
                if ($this->upload->do_upload('poster')) {
                    $file_data = $this->upload->data();
                    $data['poster'] = $file_data['file_name'];
                } else {
                    $data['poster'] = "default.png";
                }
            } else {
                unset($data['poster']);
            }
            if ($_FILES['form']['name'] != "") {
                $config2 = array(
                    'upload_path' => './asset/form/event/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'doc|docx|pdf',
                    'max_size' => 20000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config2);
                if ($this->upload->do_upload('form')) {
                    // if ($_FILES['file']['name'] != "") {
                    $file_data = $this->upload->data();
                    $data['form'] = $file_data['file_name'];
                    echo "zzz";
                } else {
                    $data['form'] = "default.docx";
                    echo "xxx";
                }
            } else {
                unset($data['form']);
            }
            $this->M_templates->update('event', $where, $data);
            redirect('cms/event');
        } else {
            $data['event'] = $this->M_templates->view_where('event', $where)->row();
            $this->load->view('cms/event/edit', $data);
        }
    }
    public function detail($id)
    {
        $where = ['id' => $id];
        $data['event'] = $this->M_templates->view_where('event', $where)->row();
        $this->load->view('cms/event/detail', $data);
    }
    public function delete($id)
    {
        $where = ['id' => $id];
        $this->M_templates->delete('event', $where);
        redirect('cms/event');
    }
}
