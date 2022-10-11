<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekskul extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('ekskul_model');
        $this->controller = 'ekskul';
    }

    public function index()
    {
        $data['title_browser'] = 'Ekskul - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_ekskul'] = $this->ekskul_model->get();
        $this->load->view('ekskul/ekskul_list', $data);
    }

    public function tambah()
    {
        $data['title_browser'] = 'Tambah Ekskul - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;

        $this->load->library('form_validation');
        $rules = $this->ekskul_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('ekskul/ekskul_form', $data);
        }

        $input = [
            'nama_ekskul' => $this->input->post('nama_ekskul'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->ekskul_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('ekskul'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('ekskul/ekskul_form', $data);
    }

    public function update($id_ekskul)
    {
        if ($id_ekskul < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('ekskul'));
        }

        $data['title_browser'] = 'Ubah ekskul - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['ekskul'] = $this->ekskul_model->find_by_id($id_ekskul);

        if (!isset($data['ekskul'])) {
            $this->session->set_flashdata('message_form_error', 'ekskul tidak ditemukan!');
            redirect(base_url('ekskul'));
        }

        $this->load->library('form_validation');
        $rules = $this->ekskul_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('ekskul/ekskul_form', $data);
        }

        $input = [
            'id_ekskul' => $id_ekskul,
            'nama_ekskul' => $this->input->post('nama_ekskul'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->ekskul_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('ekskul'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('ekskul/ekskul_form', $data);
    }
}
