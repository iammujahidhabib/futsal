<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_templates');
	}
	public function index()
	{
		if (!$this->input->post()) {
			$this->load->view('auth/player');
		} else {
			$login = $this->M_templates->view_where(
				'user',
				array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				)
			)->result_array();
			// echo $this->input->post('password')."<br>";
			// print_r($login);
			if (count($login) == 1) {
				$session = $login[0];
				$session['isLogin'] = TRUE;
				// print_r($login[0]);
				$this->session->set_userdata($session);
				if ($login[0]['role'] == 1) {
					redirect('cms/dashboard/admin');
				} else {
					if($login[0]['role'] == 2){
						$place = $this->M_templates->view_where('place',['id'=>$this->session->place_id])->row();
						$this->session->set_userdata('status_place',$place->status);
					}
					redirect('home');
				}
			} else {
				$this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">email atau Password salah! </div>');
				redirect('login');
			}
		}
	}
	public function register()
	{
		if (!$this->input->post()) {
			$this->load->view('auth/register');
		} else {
			$data = $this->input->post();
			$data['role'] = 3;
			$login = $this->M_templates->insert(
				'user',
				$data
			);
			// echo $this->input->post('password')."<br>";
			// print_r($login);
			if ($login) {
				redirect('login');
			} else {
				redirect('login/register');
			}
		}
	}
	public function register_lapangan()
	{
		if (!$this->input->post()) {
			$this->load->view('auth/register_lapangan');
		} else {
			$data = $this->input->post();
			$data['status'] = 0;

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
			if ($this->upload->do_upload('photo')) {
				$file_data = $this->upload->data();
				$data['photo'] = $file_data['file_name'];
			} else {
				$data['photo'] = "field.png";
			}

			$login = $this->M_templates->insert(
				'place',
				$data
			);
			// echo $this->input->post('password')."<br>";
			// print_r($login);
			if ($login) {
				$this->M_templates->update("user", ['id' => $this->session->id], ['place_id' => $login,'role'=>2]);
				redirect('home');
			} else {
				redirect('login/register_lapangan');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
