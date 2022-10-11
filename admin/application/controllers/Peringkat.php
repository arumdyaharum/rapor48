<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peringkat extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('peringkat_model');
        $this->controller = 'peringkat';
    }

    public function index()
    {
        $data['title_browser'] = 'Peringkat - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_peringkat'] = $this->peringkat_model->get();
        $this->load->view('peringkat/peringkat_list', $data);
    }

    public function tambah()
    {
        $data['title_browser'] = 'Tambah Peringkat - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;

        $this->load->library('form_validation');
        $rules = $this->peringkat_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('peringkat/peringkat_form', $data);
        }

        $input = [
            'peringkat' => $this->input->post('peringkat'),
            'batas_bawah' => $this->input->post('batas_bawah'),
            'batas_atas' => $this->input->post('batas_atas'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->peringkat_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('peringkat'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('peringkat/peringkat_form', $data);
    }

    public function update($id_peringkat)
    {
        if ($id_peringkat < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('peringkat'));
        }

        $data['title_browser'] = 'Ubah Peringkat - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['peringkat'] = $this->peringkat_model->find_by_id($id_peringkat);

        if (!isset($data['peringkat'])) {
            $this->session->set_flashdata('message_form_error', 'peringkat mapel tidak ditemukan!');
            redirect(base_url('peringkat'));
        }

        $this->load->library('form_validation');
        $rules = $this->peringkat_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('peringkat/peringkat_form', $data);
        }

        $input = [
            'id_peringkat' => $id_peringkat,
            'peringkat' => $this->input->post('peringkat'),
            'batas_bawah' => $this->input->post('batas_bawah'),
            'batas_atas' => $this->input->post('batas_atas'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->peringkat_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('peringkat'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('peringkat/peringkat_form', $data);
    }
}
