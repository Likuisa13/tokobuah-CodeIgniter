<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->input->post()){
            if($this->user_model->doLogin() == "admin"){
                redirect(site_url('admin'));
            }
            elseif($this->user_model->doLogin() == "customer"){
                redirect(site_url('customer'));
            }
        }
    $this->session->set_flashdata('message', 'Login Failed');
    redirect(site_url('/'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('/'));
    }
}