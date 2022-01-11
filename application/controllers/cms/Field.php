<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Field extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
        $this->session->set_userdata('func', 'field');
        // if ($this->session->isLogedIn == false) {
        //     redirect('login');
        // }
        // $this->session->set_userdata('tree', 'master');
    }
    public function index()
    {
        $data['field'] = $this->M_templates->view('field')->result();
        $this->load->view('cms/field/index', $data);
    }
    public function create()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            // if ($_FILES['file']['name'] != "") {
            $config = array(
                'upload_path' => './asset/image/field/',
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

            $config = array(
                'upload_path' => './asset/form/field/',
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
            $this->M_templates->insert('field', $data);
            redirect('cms/field');
        } else {
            $this->load->view('cms/field/create');
        }
    }
    public function edit($id)
    {
        $where = ['id' => $id];
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($_FILES['poster']['name'] != "") {
                $config = array(
                    'upload_path' => './asset/image/field/',
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
                if ($this->upload->do_upload('form')) {
                    $config = array(
                        'upload_path' => './asset/form/field/',
                        'overwrite' => false,
                        'remove_spaces' => true,
                        'allowed_types' => 'doc|docx|pdf',
                        'max_size' => 20000,
                        'xss_clean' => true,
                    );
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    // if ($_FILES['file']['name'] != "") {
                    $file_data = $this->upload->data();
                    $data['form'] = $file_data['file_name'];
                } else {
                    $data['form'] = "default.docx";
                }
            } else {
                unset($data['form']);
            }
            $this->M_templates->update('field', $where, $data);
            redirect('cms/field');
        } else {
            $data['field'] = $this->M_templates->view_where('field', $where)->row();
            $this->load->view('cms/field/edit', $data);
        }
    }
    public function delete($id)
    {
        $where = ['id' => $id];
        $this->M_templates->delete('field', $where);
        redirect('cms/field');
    }
}
