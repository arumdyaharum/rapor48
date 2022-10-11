<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if ($this->auth_model->current_user()) {
			redirect('home');
		}

		$data['title_browser'] = 'Login - ' . APP_NAME;
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message_login_error', null);
			return $this->load->view('auth/login', $data);
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->auth_model->login($username, $password)) {
			$this->session->set_flashdata('message_login_error', null);
			redirect(base_url());
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('auth/login', $data);
	}

	public function logout()
	{
		$this->auth_model->logout();
		redirect(base_url());
	}
}
