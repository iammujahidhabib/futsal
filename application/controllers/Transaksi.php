<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_templates');
    }
    public function index()
    {
        $session_id = $this->session->id;
        $data['transaction'] = $this->M_templates->query("SELECT rent.*, place.name AS name_field ,field.name AS aaa FROM rent 
        JOIN place ON place.id = rent.place_id 
        JOIN field ON field.id = rent.field_id 
        WHERE rent.user_id = $session_id")->result();
        // print_r($data['transaction']);
        $this->load->view('corporate/header');
        $this->load->view('corporate/transaction', $data);
        $this->load->view('corporate/footer');
    }
    public function store()
    {
        $user_id = $this->input->post('user_id');
        $place_id = $this->input->post('place_id');
        $field_id = $this->input->post('field_id');
        $date = $this->input->post('date');
        $start = $this->input->post('start');
        $end = $this->input->post('end');

        $count_hour = $end - $start;
        // echo $count_hour;
        $value_check_is_exist = FALSE;
        $hour = $start;
        for ($i = 0; $i < $count_hour; $i++) {
            $check_is_exist = $this->M_templates->view_where(
                'rent',
                [
                    'place_id' => $place_id,
                    'field_id' => $field_id,
                    'date' => $date,
                    'start' => $hour
                ]
            )->num_rows();
            if ($check_is_exist > 0) {
                $value_check_is_exist = TRUE;
                break;
            }
            $hour++;
        }
        if ($value_check_is_exist == TRUE) {
            redirect('lapangan/detail/' . $place_id);
        } else {
            $data['rent'] = [
                'place_id' => $place_id,
                'field_id' => $field_id,
                'date' => $date,
                'start' => $start,
                'end' => $end,
                'user_id' => $user_id,
            ];
            // $cek_id = $this->M_templates->query("SELECT user_id FROM place WHERE id = $place_id")->row();
            // echo $cek_id->user_id;
            $data['place'] = $this->M_templates->view_where('place', ['id' => $place_id])->row();
            $data['field'] = $this->M_templates->view_where('field', ['place_id' => $place_id])->row();
            $data['price'] = [];
            $hour = $start;
            for ($i = 0; $i < $count_hour; $i++) {
                $_price = $this->M_templates->query("SELECT * FROM `price` WHERE field_id = $field_id AND $hour BETWEEN start AND end")->row();
                array_push($data['price'], $_price);
                // echo $hour;
                $hour++;
            }
            // echo $count_hour;
            // echo "<pre>";
            // print_r($data);
            $this->load->view('corporate/header');
            $this->load->view('corporate/store', $data);
            $this->load->view('corporate/footer');
        }
    }
    public function save()
    {
        echo "<pre>";

        $config = array(
            'upload_path' => './asset/image/bill/',
            'overwrite' => false,
            'remove_spaces' => true,
            'allowed_types' => 'png|jpg|gif|jpeg',
            'max_size' => 10000,
            'xss_clean' => true,
        );
        $this->load->library('upload');
        $this->upload->initialize($config);
        $data = $this->input->post();
        $data['pay_off'] = $this->input->post('total')-$this->input->post('dp');
        $data['status'] = 0;
        // if ($_FILES['file']['name'] != "") {
        if ($this->upload->do_upload('bill_file')) {
            $file_data = $this->upload->data();
            $data['bill_file'] = $file_data['file_name'];
        } else {
            $data['bill_file'] = "default.png";
        }
        print_r($data);
        $this->M_templates->insert("rent",$data);
        redirect('transaksi/');
    }
    public function cancel($id)
    {
        $this->M_templates->update("rent",['id'=>$id],['status'=>3]);
        redirect('transaksi');
    }
}
