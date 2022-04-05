<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
        $this->session->set_userdata('func', 'type_field');
        // if ($this->session->isLogedIn == false) {
        //     redirect('login');
        // }
        // $this->session->set_userdata('tree', 'master');
    }
    public function index()
    {
        // echo $this->session->id;
        $id = $this->session->id;
        $data['type'] = $this->M_templates->view_where('type_field', ['field_id' => $this->session->id])->result();
        $data['price'] = $this->M_templates->query("SELECT price.*,type_field.type FROM price JOIN type_field ON type_field.id=price.type_field_id WHERE field_id = $id")->result();
        $this->load->view('cms/field/index', $data);
    }
    public function create()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            // if ($_FILES['file']['name'] != "") {
            $config = array(
                'upload_path' => './asset/image/',
                'overwrite' => false,
                'remove_spaces' => true,
                'allowed_types' => 'png|jpg|gif|jpeg',
                'max_size' => 10000,
                'xss_clean' => true,
            );
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('photo')) {
                $file_data = $this->upload->data();
                $data['photo'] = $file_data['file_name'];
            } else {
                $data['photo'] = "default.png";
            }

            $this->M_templates->insert('type_field', $data);
            redirect('cms/type');
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
                    'upload_path' => './asset/image/',
                    'overwrite' => false,
                    'remove_spaces' => true,
                    'allowed_types' => 'png|jpg|gif|jpeg',
                    'max_size' => 10000,
                    'xss_clean' => true,
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('photo')) {
                    $file_data = $this->upload->data();
                    $data['photo'] = $file_data['file_name'];
                } else {
                    $data['photo'] = "default.png";
                }
            }
            $this->M_templates->update('type_field', $where, $data);
            redirect('cms/type');
        } else {
            $data['type'] = $this->M_templates->view_where('type_field', $where)->row();
            $this->load->view('cms/field/edit', $data);
        }
    }
    public function delete($id)
    {
        $where = ['id' => $id];
        $this->M_templates->delete('type_field', $where);
        redirect('cms/type');
    }
    public function create_price()
    {
        if ($this->input->post()) {
            $data = $this->input->post();

            $this->M_templates->insert('price', $data);
            redirect('cms/type');
        } else {
            $data['type'] = $this->M_templates->view_where('type_field', ['field_id' => $this->session->id])->result();
            $this->load->view('cms/field/create_price',$data);
        }
    }
    public function edit_price($id)
    {
        $where = ['id' => $id];
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->M_templates->update('price', $where, $data);
            redirect('cms/type');
        } else {
            $data['type'] = $this->M_templates->view_where('type_field', ['field_id' => $this->session->id])->result();
            $data['price'] = $this->M_templates->view_where('price', $where)->row();
            $this->load->view('cms/field/edit_price', $data);
        }
    }
    public function delete_price($id)
    {
        $where = ['id' => $id];
        $this->M_templates->delete('price', $where);
        redirect('cms/type');
    }
}
