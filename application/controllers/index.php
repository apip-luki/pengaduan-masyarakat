<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->model('masyarakat_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Aplikasi Pengaduan Masyarakat',
            'history' => $this->masyarakat_model->get_history()
        ];

        $this->load->view('user/index', $data);
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function report()
    {
        $valid = $this->form_validation;
        $valid->set_rules('judul', 'Judul laporan', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('tanggal', 'Tanggal', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('laporan', 'Isi laporan', 'required', ['required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {
            $this->load->view('user/index');
        } else {
            $slug_unik = random_string('numeric', 5);

            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $slug_unik;
            $config['max_size'] = 5000;
            $config['max_width'] = 5000;
            $config['max_height'] = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('upload')) {
                $data = [
                    'pengaduan_tgl' => htmlspecialchars($this->input->post('tanggal', true)),
                    'pengaduan_nik' => $this->session->userdata('nik'),
                    'pengaduan_judul' => htmlspecialchars($this->input->post('judul', true)),
                    'pengaduan_isi' => htmlspecialchars($this->input->post('laporan', true)),
                    'pengaduan_status' => '0'
                ];

                $this->masyarakat_model->report($data);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert">Berhasil Mengirimkan Laporan</div>');
                redirect('index');
            } else {
                $upload = ['upload' => $this->upload->data()];

                $data = [
                    'pengaduan_tgl' => htmlspecialchars($this->input->post('tanggal', true)),
                    'pengaduan_nik' => $this->session->userdata('nik'),
                    'pengaduan_judul' => htmlspecialchars($this->input->post('judul', true)),
                    'pengaduan_isi' => htmlspecialchars($this->input->post('laporan', true)),
                    'pengaduan_foto' => $upload['upload']['file_name'],
                    'pengaduan_status' => '0'
                ];

                $this->masyarakat_model->report($data);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert">Berhasil Mengirimkan Laporan</div>');
                redirect('index');
            }
        }
    }
}
