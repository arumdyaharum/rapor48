<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function index()
    {
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        } else {
            redirect('home');
        }
    }
}
