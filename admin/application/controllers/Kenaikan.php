<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kenaikan extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('keterangan_naik_model');
        $this->controller = 'kenaikan';
    }

    public function index()
    {
        $data['title_browser'] = 'Keterangan Naik - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_status'] = NAIK_STATUS;
        $data['data_kenaikan'] = $this->keterangan_naik_model->get();
        $this->load->view('kenaikan/kenaikan_list', $data);
    }

    public function tambah()
    {
        $this->load->model('kelas_model');

        $data['title_browser'] = 'Tambah Keterangan Naik - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_status'] = NAIK_STATUS;
        $data['data_kelas'] = $this->kelas_model->get();

        $this->load->library('form_validation');
        $rules = $this->keterangan_naik_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('kenaikan/kenaikan_form', $data);
        }

        $input = [
            'id_kelas' => $this->input->post('id_kelas'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->keterangan_naik_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('kenaikan'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('kenaikan/kenaikan_form', $data);
    }

    public function update($id_keterangan_naik)
    {
        if ($id_keterangan_naik < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('kenaikan'));
        }

        $this->load->model('kelas_model');

        $data['title_browser'] = 'Ubah Keterangan Naik - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_status'] = NAIK_STATUS;
        $data['data_kelas'] = $this->kelas_model->get();
        $data['kenaikan'] = $this->keterangan_naik_model->find_by_id($id_keterangan_naik);

        if (!isset($data['kenaikan'])) {
            $this->session->set_flashdata('message_form_error', 'kenaikan kenaikan tidak ditemukan!');
            redirect(base_url('kenaikan'));
        }

        $this->load->library('form_validation');
        $rules = $this->keterangan_naik_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('kenaikan/kenaikan_form', $data);
        }

        $input = [
            'id_keterangan_naik' => $id_keterangan_naik,
            'id_kelas' => $this->input->post('id_kelas'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->keterangan_naik_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('kenaikan'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('kenaikan/kenaikan_form', $data);
    }
}
