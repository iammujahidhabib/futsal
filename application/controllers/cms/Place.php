<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Place extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
        $this->session->set_userdata('func', 'place');
        // if ($this->session->isLogedIn == false) {
        //     redirect('login');
        // }
        // $this->session->set_userdata('tree', 'master');
    }
    public function index()
    {
        if($this->session->role == 2){
            $data['place'] = $this->M_templates->view_where('place',['id'=>$this->session->place_id])->row();
            $this->load->view('cms/place/place', $data);
        }elseif($this->session->role == 1){
            $data['place'] = $this->M_templates->view('place')->result();
            $this->load->view('cms/place/index', $data);
        }
    }
    public function detail($id)
    {
        $data['place'] = $this->M_templates->view_where('place', ['id' => $id])->row();
        $data['type'] = $this->M_templates->view_where('field', ['place_id' => $id])->result();
        $data['price'] = $this->M_templates->query("SELECT price.*,field.name FROM price JOIN field ON field.id=price.field_id WHERE place_id = $id")->result();
        $this->load->view('cms/place/detail', $data);
    }
    public function update_place($id)
    {
        $name = $this->input->post("name");
        $open = $this->input->post("open");
        $close = $this->input->post("close");
        $phone = $this->input->post("phone");
        $desc = $this->input->post("desc");
        $address = $this->input->post("address");
        $bank = $this->input->post("bank");
        $bank_account = $this->input->post("bank_account");
        $bank_name = $this->input->post("bank_name");
        $data = [
            'name'=>$name,
            'open'=>$open,
            'close'=>$close,
            'phone'=>$phone,
            'desc'=>$desc,
            'address'=>$address,
            'bank'=>$bank,
            'bank_account'=>$bank_account,
            'bank_name'=>$bank_name,
        ];
        if ($_FILES['photo']['name'] != "") {
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
            // if ($_FILES['file']['name'] != "") {
            if ($this->upload->do_upload('photo')) {
                $file_data = $this->upload->data();
                $data['photo'] = $file_data['file_name'];
            } 
        }
        $query = $this->M_templates->update("place",["id"=>$id],$data);
        if($query){
            $this->session->set_flashdata("message",'<script language="javascript">' .
                    'alert("Data Place berhasil diubah!");' .
                '</script>');
        }
        redirect('cms/place');
    }
}