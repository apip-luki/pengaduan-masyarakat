<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('masyarakat_model');
    }

    public function index()
    {
        $valid = $this->form_validation;
        $valid->set_rules('username', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('password', 'Password', 'required|trim|min_length[5]', ['required' => '%s tidak boleh kosong', 'min_length' => '%s minimal 5 karakter']);

        if (!$valid->run()) {
            $data['title'] = 'Login';
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $user = $this->input->post('username');
        $pass = sha1($this->input->post('password'));

        // $masyarakat = $this->db->query("call login_masyarakat('$user', '$pass')");
        $masyarakat = $this->masyarakat_model->login($user, $pass);

        if ($masyarakat->num_rows() > 0) {
            $data = $masyarakat->row();
            $session = [
                'username' => $data->masyarakat_username,
                'nama' => $data->masyarakat_nama,
                'nik' => $data->masyarakat_nik
            ];
            $this->session->set_userdata($session);
            redirect('index');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert">Username atau Password salah</div>');
            redirect('login');
        }
    }

    public function register()
    {
        $valid = $this->form_validation;
        $valid->set_rules('masyarakat_nik', 'NIK', 'required|trim|is_unique[tb_masyarakat.masyarakat_nik]', ['required' => '%s tidak boleh kosong', 'is_unique' => '%s sudah terdaftar!']);
        $valid->set_rules('masyarakat_nama', 'Nama', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('masyarakat_username', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('masyarakat_password', 'Password', 'required|trim|min_length[5]', ['required' => '%s tidak boleh kosong', 'min_length' => '%s min 5 karakter']);

        if (!$valid->run()) {
            $data['title'] = 'Registrasi';
            $this->load->view('register', $data);
        } else {
            $data = [
                'masyarakat_nik' => htmlspecialchars($this->input->post('masyarakat_nik', true)),
                'masyarakat_nama' => htmlspecialchars($this->input->post('masyarakat_nama', true)),
                'masyarakat_username' => htmlspecialchars($this->input->post('masyarakat_username', true)),
                'masyarakat_password' => sha1(htmlspecialchars($this->input->post('masyarakat_password', true))),
                'masyarakat_telp' => htmlspecialchars($this->input->post('masyarakat_telp', true))
            ];

            $this->masyarakat_model->register($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert">Berhasil Registrasi, Silahkan Login</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('nik');

        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert">Berhasil Logout</div>');
        redirect('index');
    }
}
