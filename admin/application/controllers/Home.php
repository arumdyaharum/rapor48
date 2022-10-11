<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    protected $controller;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth');
        }
        $this->controller = 'home';
    }

    public function index()
    {
        $data['title_browser'] = 'Home - ' . APP_NAME;
        $data['current_user'] = $this->auth_model->current_user();
        $data['current_page'] = $this->controller;
        $this->load->view('home/home', $data);
    }
}
