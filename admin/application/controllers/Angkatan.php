<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angkatan extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->load->model('siswa_model');
        $this->controller = 'angkatan';
    }

    public function index()
    {
        $data['title_browser'] = 'Daftar Angkatan - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['data_angkatan'] = $this->siswa_model->get_angkatan_list();
        $this->load->view('angkatan/angkatan_list', $data);
    }

    public function siswa($angkatan)
    {
        $this->load->model('kelas_model');

        $data['title_browser'] = 'Daftar Siswa Angkatan ' . $angkatan . ' - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['angkatan'] = $angkatan;

        $data_siswa = $this->siswa_model->get_siswa_angkatan($angkatan);
        $data['data_siswa'] = $data_siswa;

        // $kelas_terakhir = array();
        // foreach ($data_siswa as $key => $siswa) {
        //     $data_kelas_akhir = $this->kelas_model->find_last_kelas_by_id_siswa($siswa->id_siswa);
        //     if ($data_kelas_akhir) {
        //         array_push($kelas_terakhir, $data_kelas_akhir->tingkat . '-' . $data_kelas_akhir->jurusan);
        //     } else {
        //         array_push($kelas_terakhir, '-');
        //     }
        // }
        // $data['kelas_terakhir'] = $kelas_terakhir;

        $this->load->view('angkatan/siswa_list', $data);
    }

    public function tambah($angkatan = null)
    {
        $this->load->model('kelas_model');

        $data['title_browser'] = 'Tambah Siswa - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['status'] = STUDENT_STATUS;
        $data['data_kelas'] = $this->kelas_model->get();
        if ($angkatan) {
            $data['angkatan'] = $angkatan;
        }

        $this->load->library('form_validation');
        $rules = $this->siswa_model->rules();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|is_unique[tb_siswa.username]', []);
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('angkatan/angkatan_form', $data);
        }

        $input = [
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'id_kelas_awal' => $this->input->post('id_kelas_awal'),
            'angkatan' => $this->input->post('angkatan'),
            'username' => $this->input->post('username'),
            'pass' => $this->input->post('pass'),
            'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
            'status' => $this->input->post('status'),
        ];

        if ($this->siswa_model->insert($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('angkatan'));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('angkatan/angkatan_form', $data);
    }

    public function update($id_siswa)
    {
        if ($id_siswa < 0) {
            $this->session->set_flashdata('message_form_error', 'Parameter salah!');
            redirect(base_url('angkatan'));
        }

        $this->load->model('kelas_model');

        $data['title_browser'] = 'Ubah Siswa - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $data['status'] = STUDENT_STATUS;
        $data['data_kelas'] = $this->kelas_model->get();
        $data['siswa'] = $this->siswa_model->find_by_id($id_siswa);

        if (!isset($data['siswa'])) {
            $this->session->set_flashdata('message_form_error', 'Siswa tidak ditemukan!');
            redirect(base_url('angkatan'));
        }

        $this->load->library('form_validation');
        $rules = $this->siswa_model->rules();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]', []);
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_form_error', '');
            return $this->load->view('angkatan/angkatan_form', $data);
        }

        $other_username = $this->siswa_model->find_other_username($id_siswa, $this->input->post('username'));
        if (isset($other_username->username)) {
            $this->session->set_flashdata('message_form_error', 'Username sudah dimiliki siswa lain!');
            return $this->load->view('angkatan/angkatan_form', $data);
        }

        $input = [
            'id_siswa' => $id_siswa,
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'id_kelas_awal' => $this->input->post('id_kelas_awal'),
            'angkatan' => $this->input->post('angkatan'),
            'username' => $this->input->post('username'),
            'pass' => $this->input->post('pass'),
            'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
            'status' => $this->input->post('status'),
        ];

        if ($this->siswa_model->update($input)) {
            $this->session->set_flashdata('message_form_error', null);
            redirect(base_url('angkatan/siswa/' . $this->input->post('angkatan')));
        } else {
            $this->session->set_flashdata('message_form_error', 'Input data ke database gagal!');
        }

        $this->load->view('angkatan/angkatan_form', $data);
    }
}
