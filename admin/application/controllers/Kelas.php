<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('kelas_model');
        $this->controller = 'kelas';
    }

    public function index()
    {
        $data['title_browser'] = 'Daftar Kelas - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;

        $tingkat_list = CLASS_LEVEL;
        $kelas_aktif = array();
        $kelas_nonaktif = array();
        foreach ($tingkat_list as $key => $value) {
            array_push($kelas_aktif, $this->kelas_model->find_by_tingkat($value));
            array_push($kelas_nonaktif, $this->kelas_model->find_by_tingkat($value, FALSE));
        }

        $data['tingkat_list'] = $tingkat_list;
        $data['kelas_aktif'] = $kelas_aktif;
        $data['kelas_nonaktif'] = $kelas_nonaktif;

        $this->load->view('kelas/kelas_list', $data);
    }

    public function tambah()
    {
        $data['title_browser'] = 'Tambah Kelas - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['tingkat_list'] = CLASS_LEVEL;

        $this->load->library('form_validation');
        $rules = $this->kelas_model->rules();
        $this->form_validation->set_rules('tingkat[]', 'Tingkat', 'required', ['required' => 'Tingkat kelas wajib diisi!']);
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('kelas/kelas_form', $data);
        }

        $input = [
            'tingkat' => $this->input->post('tingkat'),
            'jurusan' => $this->input->post('jurusan'),
            'is_active' => $this->input->post('is_active')
        ];

        if ($this->kelas_model->bulk_insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('kelas'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('kelas/kelas_form', $data);
    }

    public function update($id_kelas)
    {
        if ($id_kelas < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('kelas'));
        }

        $data['title_browser'] = 'Ubah Kelas - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['tingkat_list'] = CLASS_LEVEL;
        $data['kelas'] = $this->kelas_model->find_by_id($id_kelas);

        if (empty($data['kelas'])) {
            $this->session->set_flashdata('message_form_error', 'Kelas tidak ditemukan!');
            redirect(base_url('kelas'));
        }

        $this->load->library('form_validation');
        $rules = $this->kelas_model->rules();
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required', ['required' => 'Tingkat kelas wajib diisi!']);
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('kelas/kelas_form', $data);
        }

        $input = [
            'id_kelas' => $id_kelas,
            'tingkat' => $this->input->post('tingkat'),
            'jurusan' => $this->input->post('jurusan'),
            'is_active' => $this->input->post('is_active')
        ];

        if ($this->kelas_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('kelas'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('kelas/kelas_form', $data);
    }
}
