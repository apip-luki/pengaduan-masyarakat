<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('petugas_model');
    }

    public function index()
    {
        $valid = $this->form_validation;
        $valid->set_rules('username', 'Username', 'required|trim', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('password', 'Password', 'required|trim|min_length[5]', ['required' => '%s tidak boleh kosong', 'min_length' => '%s min 5 karakter']);

        if (!$valid->run()) {
            $data['title'] = 'Login Petugas';
            $this->load->view('ro-login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $user = $this->input->post('username');
        $pass = sha1($this->input->post('password'));

        // $masyarakat = $this->db->query("call login_masyarakat('$user', '$pass')");
        $petugas = $this->petugas_model->login_petugas($user, $pass);

        if ($petugas->num_rows() > 0) {
            $data = $petugas->row();
            $session = [
                'id' => $data->petugas_id,
                'username' => $data->petugas_username,
                'nama' => $data->petugas_nama,
                'level' => $data->petugas_level
            ];
            $this->session->set_userdata($session);
            if ($data->petugas_level == 'Admin') {
                redirect('ro-admin');
            } else {
                redirect('ro-petugas');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert">Username atau Password salah</div>');
            redirect('ro-login/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert">Berhasil Logout</div>');
        redirect('ro-login/login');
    }
}
