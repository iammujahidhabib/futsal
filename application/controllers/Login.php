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
				if($login[0]['role'] == 1){
					redirect('cms/dashboard/admin');
				}else{
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
			$login = $this->M_templates->view_where(
				'user',
				array(
					'role' => 3,
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				)
			)->result_array();
			// echo $this->input->post('password')."<br>";
			// print_r($login);
			if (count($login) == 1) {
				$session = $login[0];
				$session['isLogin'] = TRUE;
				$this->session->set_userdata($session);
				redirect('home');
			} else {
				$this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">email atau Password salah! </div>');
				redirect('login');
			}
		}
	}
	public function register_lapangan()
	{
		if (!$this->input->post()) {
			$this->load->view('auth/register_lapangan');
		} else {
			$login = $this->M_templates->view_where(
				'user',
				array(
					'role' => 3,
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				)
			)->result_array();
			// echo $this->input->post('password')."<br>";
			// print_r($login);
			if (count($login) == 1) {
				$session = $login[0];
				$session['isLogin'] = TRUE;
				$this->session->set_userdata($session);
				redirect('home');
			} else {
				$this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">email atau Password salah! </div>');
				redirect('login');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
