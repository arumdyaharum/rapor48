<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('mapel_model');
        $this->controller = 'mapel';
    }

    public function index()
    {
        $data['title_browser'] = 'Mapel - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_mapel'] = $this->mapel_model->get();
        $this->load->view('mapel/mapel_list', $data);
    }

    public function tambah()
    {
        $this->load->model('kelompok_model');

        $data['title_browser'] = 'Tambah Mapel - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_kelompok'] = $this->kelompok_model->get();

        $this->load->library('form_validation');
        $rules = $this->mapel_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('mapel/mapel_form', $data);
        }

        $input = [
            'nama_mapel' => $this->input->post('nama_mapel'),
            'id_kelompok' => $this->input->post('id_kelompok'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->mapel_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('mapel'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('mapel/mapel_form', $data);
    }

    public function update($id_mapel)
    {
        if ($id_mapel < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('mapel'));
        }

        $this->load->model('kelompok_model');

        $data['title_browser'] = 'Ubah mapel - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_kelompok'] = $this->kelompok_model->get();
        $data['mapel'] = $this->mapel_model->find_by_id($id_mapel);

        if (!isset($data['mapel'])) {
            $this->session->set_flashdata('message_form_error', 'mapel mapel tidak ditemukan!');
            redirect(base_url('mapel'));
        }

        $this->load->library('form_validation');
        $rules = $this->mapel_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('mapel/mapel_form', $data);
        }

        $input = [
            'id_mapel' => $id_mapel,
            'nama_mapel' => $this->input->post('nama_mapel'),
            'id_kelompok' => $this->input->post('id_kelompok'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->mapel_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('mapel'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('mapel/mapel_form', $data);
    }
}
