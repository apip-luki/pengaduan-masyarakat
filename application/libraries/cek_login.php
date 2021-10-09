<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function cek_admin()
    {
        if ($this->CI->session->userdata('username') == '' || $this->CI->session->userdata('username') == null) {
            $this->CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert">Silahkan login terlebih dahulu!</div>');
            redirect('ro-login/login');

            if ($this->CI->session->userdata('level') != 'Admin') {
                $this->CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert">Silahkan login terlebih dahulu!</div>');
                redirect('ro-login/login');
            }
        }
    }

    public function cek_petugas()
    {
        if ($this->CI->session->userdata('username') == '') {
            $this->CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert">Silahkan login terlebih dahulu!</div>');
            redirect('ro-login/login');

            if ($this->CI->session->userdata('level') != 'Petugas') {
                $this->CI->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert">Silahkan login terlebih dahulu!</div>');
                redirect('ro-login/login');
            }
        }
    }
}
