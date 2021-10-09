<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('petugas_model');

        $this->cek_login->cek_admin();
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard Aplikasi Pengaduan';
        $this->load->view('ro-admin/layout/header', $data);
        $this->load->view('ro-admin/layout/sidebar', $data);
        $this->load->view('ro-admin/layout/topbar', $data);
        $this->load->view('ro-admin/index', $data);
        $this->load->view('ro-admin/layout/footer', $data);
    }

    public function petugas()
    {
        $data = [
            'title' => 'Data Petugas',
            'petugas' => $this->petugas_model->get_petugas()
        ];

        $this->load->view('ro-admin/layout/header', $data);
        $this->load->view('ro-admin/layout/sidebar', $data);
        $this->load->view('ro-admin/layout/topbar', $data);
        $this->load->view('ro-admin/petugas/get_petugas', $data);
        $this->load->view('ro-admin/layout/footer', $data);
    }

    public function create_ptg()
    {
        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('username', 'Username', 'required|trim', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('password', 'Password', 'required|trim|min_length[5]', ['required' => '%s tidak boleh kosong', 'min_length' => '%s min 5 karakter']);
        $valid->set_rules('level', 'Level', 'required', ['required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {
            $data = [
                'title' => 'Tambah Petugas',
            ];

            $this->load->view('ro-admin/layout/header', $data);
            $this->load->view('ro-admin/layout/sidebar', $data);
            $this->load->view('ro-admin/layout/topbar', $data);
            $this->load->view('ro-admin/petugas/create', $data);
            $this->load->view('ro-admin/layout/footer', $data);
        } else {
            $data = [
                'petugas_nama' => htmlspecialchars($this->input->post('nama', true)),
                'petugas_username' => htmlspecialchars($this->input->post('username', true)),
                'petugas_telp' => htmlspecialchars($this->input->post('telp', true)),
                'petugas_level' => htmlspecialchars($this->input->post('level', true)),
                'petugas_password' => sha1(htmlspecialchars($this->input->post('password', true)))
            ];

            $this->petugas_model->insert($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Petugas Baru Berhasil Ditambahkan</div>');
            redirect('ro-admin/index/petugas');
        }
    }

    public function update_ptg($petugas_id)
    {
        $petugas = $this->petugas_model->detail($petugas_id);

        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('username', 'Username', 'required|trim', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('password', 'Password', 'trim|min_length[5]', ['min_length' => '%s min 5 karakter']);
        $valid->set_rules('level', 'Level', 'required', ['required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {
            $data = [
                'title' => 'Edit Petugas',
                'petugas' => $petugas
            ];

            $this->load->view('ro-admin/layout/header', $data);
            $this->load->view('ro-admin/layout/sidebar', $data);
            $this->load->view('ro-admin/layout/topbar', $data);
            $this->load->view('ro-admin/petugas/update', $data);
            $this->load->view('ro-admin/layout/footer', $data);
        } else {
            $data = [
                'petugas_id' => $petugas_id,
                'petugas_nama' => htmlspecialchars($this->input->post('nama', true)),
                'petugas_username' => htmlspecialchars($this->input->post('username', true)),
                'petugas_telp' => htmlspecialchars($this->input->post('telp', true)),
                'petugas_level' => htmlspecialchars($this->input->post('level', true)),
            ];

            $data2 = [
                'petugas_id' => $petugas_id,
                'petugas_nama' => htmlspecialchars($this->input->post('nama', true)),
                'petugas_username' => htmlspecialchars($this->input->post('username', true)),
                'petugas_telp' => htmlspecialchars($this->input->post('telp', true)),
                'petugas_level' => htmlspecialchars($this->input->post('level', true)),
                'petugas_password' => sha1(htmlspecialchars($this->input->post('password', true)))
            ];

            if ($this->input->post('password') == null || $this->input->post('password') == '') {
                $this->petugas_model->update($data);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Petugas <b>' . $petugas->petugas_nama . '</b> Berhasil Diperbarui</div>');
                redirect('ro-admin/index/petugas');
            } else {
                $this->petugas_model->update_pass($data2);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Petugas <b>' . $petugas->petugas_nama . '</b> Berhasil Diperbarui</div>');
                redirect('ro-admin/index/petugas');
            }
        }
    }

    public function delete_ptg($petugas_id)
    {
        $petugas = $this->petugas_model->detail($petugas_id);

        $data['petugas_id'] = $petugas->petugas_id;

        $this->petugas_model->delete($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Petugas <b>' . $petugas->petugas_nama . '</b> Berhasil Dihapus</div>');
        redirect('ro-admin/index/petugas');
    }
}
