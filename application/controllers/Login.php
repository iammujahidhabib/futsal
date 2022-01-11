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
				'account',
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
	public function field()
	{
		if (!$this->input->post()) {
			$this->load->view('auth/field');
		} else {
			$login = $this->M_templates->view_where(
				'account',
				array(
					'role' => 2,
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
				redirect('cms/dashboard/field');
			} else {
				$this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">email atau Password salah! </div>');
				redirect('login/field');
			}
		}
	}
	public function school()
	{
		if ($this->input->post()) {
			$this->load->view('auth/school');
		} else {
			$login = $this->M_templates->view_where(
				'account',
				array(
					'role' => 'school',
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
				redirect('cms/dashboard/school');
			} else {
				$this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">email atau Password salah! </div>');
				redirect('login/school');
			}
		}
	}
	public function eventorganizer()
	{
		if ($this->input->post()) {
			$this->load->view('auth/eventorganizer');
		} else {
			$login = $this->M_templates->view_where(
				'account',
				array(
					'role' => 'eventorganizer',
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
				redirect('cms/dashboard/eventorganizer');
			} else {
				$this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">email atau Password salah! </div>');
				redirect('login/eventorganizer');
			}
		}
	}
	public function admin()
	{
		if (!$this->input->post()) {
			$this->load->view('auth/admin');
		} else {
			$login = $this->M_templates->view_where(
				'account',
				array(
					'role' => 1,
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
				print_r($this->session->userdata());
				redirect('cms/dashboard/admin');
			} else {
				$this->session->set_flashdata('error_log', '<div class="alert alert-danger" role="alert">email atau Password salah! </div>');
				redirect('login/admin');
			}
		}
	}
	public function register()
	{
		if (!$this->input->post()) {
			$this->load->view('auth/register');
		} else {
			$login = $this->M_templates->view_where(
				'account',
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
				'account',
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
