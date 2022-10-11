<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('kelompok_model');
        $this->controller = 'kelompok';
    }

    public function index()
    {
        $data['title_browser'] = 'Kelompok Mapel - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_kelompok'] = $this->kelompok_model->get();
        $this->load->view('kelompok/kelompok_list', $data);
    }

    public function tambah()
    {
        $data['title_browser'] = 'Tambah Kelompok Mapel - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;

        $this->load->library('form_validation');
        $rules = $this->kelompok_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('kelompok/kelompok_form', $data);
        }

        $input = [
            'deskripsi' => $this->input->post('deskripsi'),
            'pengetahuan_persen' => $this->input->post('pengetahuan_persen'),
            'keterampilan_persen' => $this->input->post('keterampilan_persen'),
            'desimal' => $this->input->post('desimal'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->kelompok_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('kelompok'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('kelompok/kelompok_form', $data);
    }

    public function update($id_kelompok)
    {
        if ($id_kelompok < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('kelompok'));
        }

        $data['title_browser'] = 'Ubah Kelompok Mapel - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['kelompok'] = $this->kelompok_model->find_by_id($id_kelompok);

        if (!isset($data['kelompok'])) {
            $this->session->set_flashdata('message_form_error', 'Kelompok mapel tidak ditemukan!');
            redirect(base_url('kelompok'));
        }

        $this->load->library('form_validation');
        $rules = $this->kelompok_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('kelompok/kelompok_form', $data);
        }

        $input = [
            'id_kelompok' => $id_kelompok,
            'deskripsi' => $this->input->post('deskripsi'),
            'pengetahuan_persen' => $this->input->post('pengetahuan_persen'),
            'keterampilan_persen' => $this->input->post('keterampilan_persen'),
            'desimal' => $this->input->post('desimal'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->kelompok_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('kelompok'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('kelompok/kelompok_form', $data);
    }
}
