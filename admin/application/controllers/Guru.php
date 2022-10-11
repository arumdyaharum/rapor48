<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('guru_model');
        $this->controller = 'guru';
    }

    public function index()
    {
        $data['title_browser'] = 'Daftar Guru - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_guru'] = $this->guru_model->get();
        $this->load->view('guru/guru_list', $data);
    }

    public function tambah()
    {
        $data['title_browser'] = 'Tambah Guru - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;

        $this->load->library('form_validation');
        $rules = $this->guru_model->rules();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|is_unique[tb_guru.username]', []);
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('guru/guru_form', $data);
        }

        $input = [
            'nip' => $this->input->post('nip'),
            'nama_guru' => $this->input->post('nama_guru'),
            'username' => $this->input->post('username'),
            'pass' => $this->input->post('pass'),
            'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
        ];

        if ($this->guru_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('guru/guru_form', $data);
    }

    public function update($id_guru)
    {
        if ($id_guru < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('guru'));
        }

        $data['title_browser'] = 'Ubah Siswa - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['guru'] = $this->guru_model->find_by_id($id_guru);

        if (!isset($data['guru'])) {
            $this->session->set_flashdata('message_form_error', 'Siswa tidak ditemukan!');
            redirect(base_url('guru'));
        }

        $this->load->library('form_validation');
        $rules = $this->guru_model->rules();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]', []);
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('guru/guru_form', $data);
        }

        $other_username = $this->guru_model->find_other_username($id_guru, $this->input->post('username'));
        if (isset($other_username->username)) {
            $this->session->set_flashdata('message_form_error', 'Username sudah dimiliki siswa lain!');
            return $this->load->view('guru/guru_form', $data);
        }

        $input = [
            'id_guru' => $id_guru,
            'nip' => $this->input->post('nip'),
            'nama_guru' => $this->input->post('nama_guru'),
            'username' => $this->input->post('username'),
            'pass' => $this->input->post('pass'),
            'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
        ];

        if ($this->guru_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('guru/guru_form', $data);
    }
}
