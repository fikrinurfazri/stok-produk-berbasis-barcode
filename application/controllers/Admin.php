<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data = [
            'title'  => "Dashboard",
            'user'   => $this->user_model->getuser()
        ];
        $this->load->view('pages/head', $data);
        $this->load->view('pages/nav');
        $this->load->view('admin/index', $data);
        $this->load->view('pages/footer');
    }
}
