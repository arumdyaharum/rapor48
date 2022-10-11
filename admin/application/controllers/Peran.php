<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peran extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('peran_model');
        $this->controller = 'peran';
    }

    public function index()
    {
        $data['title_browser'] = 'Peran - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_peran'] = $this->peran_model->get();
        $this->load->view('peran/peran_list', $data);
    }

    public function tambah()
    {
        $data['title_browser'] = 'Tambah Peran - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;

        $this->load->library('form_validation');
        $rules = $this->peran_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('peran/peran_form', $data);
        }

        $input = [
            'nama_peran' => $this->input->post('nama_peran'),
            'is_walas' => $this->input->post('is_walas'),
            'do_nilai' => $this->input->post('do_nilai'),
            'do_akademik' => $this->input->post('do_akademik'),
            'do_prakerin' => $this->input->post('do_prakerin'),
            'do_ekskul' => $this->input->post('do_ekskul'),
            'do_absensi' => $this->input->post('do_absensi'),
            'do_kenaikan' => $this->input->post('do_kenaikan'),
            'do_karakter' => $this->input->post('do_karakter'),
            'do_leger' => $this->input->post('do_leger'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->peran_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('peran'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('peran/peran_form', $data);
    }

    public function update($id_peran)
    {
        if ($id_peran < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('peran'));
        }

        $data['title_browser'] = 'Ubah Peran - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['peran'] = $this->peran_model->find_by_id($id_peran);

        if (!isset($data['peran'])) {
            $this->session->set_flashdata('message_form_error', 'peran tidak ditemukan!');
            redirect(base_url('peran'));
        }

        $this->load->library('form_validation');
        $rules = $this->peran_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('peran/peran_form', $data);
        }

        $input = [
            'id_peran' => $id_peran,
            'nama_peran' => $this->input->post('nama_peran'),
            'is_walas' => $this->input->post('is_walas'),
            'do_nilai' => $this->input->post('do_nilai'),
            'do_akademik' => $this->input->post('do_akademik'),
            'do_prakerin' => $this->input->post('do_prakerin'),
            'do_ekskul' => $this->input->post('do_ekskul'),
            'do_absensi' => $this->input->post('do_absensi'),
            'do_kenaikan' => $this->input->post('do_kenaikan'),
            'do_karakter' => $this->input->post('do_karakter'),
            'do_leger' => $this->input->post('do_leger'),
            'is_active' => $this->input->post('is_active'),
        ];

        if ($this->peran_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('peran'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('peran/peran_form', $data);
    }
}
