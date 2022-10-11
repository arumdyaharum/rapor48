<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_ajar extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('tahun_ajar_model');
        $this->controller = 'tahun_ajar';
    }

    public function index()
    {
        $data['title_browser'] = 'Tahun Ajar - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_tahun_ajar'] = $this->tahun_ajar_model->get();
        $this->load->view('tahun_ajar/tahun_ajar_list', $data);
    }

    public function tambah()
    {
        $data['title_browser'] = 'Tahun Ajar - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;

        // $this->load->library('form_validation');
        // $rules = $this->tahun_ajar_model->rules();
        // $this->form_validation->set_rules($rules);

        // if ($this->form_validation->run() == FALSE) {
        //     $this->session->set_flashdata('message_form_error', '');
        //     return $this->load->view('tahun_ajar/tahun_ajar_form', $data);
        // }

        // $input = [
        //     'nama_ekskul' => $this->input->post('nama_ekskul'),
        //     'is_active' => $this->input->post('is_active'),
        // ];

        // if ($this->tahun_ajar_model->insert($input)) {
        //     $this->session->set_flashdata('message_form_error', null);
        //     redirect(base_url('tahun_ajar'));
        // } else {
        //     $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        // }

        $this->load->view('tahun_ajar/tahun_ajar_form', $data);
    }
}
