<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengaduan_model');
        $this->load->model('tanggapan_model');
    }

    public function index()
    {
        $data['title'] = 'Petugas Dashboard Aplikasi Pengaduan';
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/layout/topbar', $data);
        $this->load->view('ro-petugas/index', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function pengaduan_masuk()
    {
        $pengaduan = $this->pengaduan_model->pengaduan_masuk();

        $data = [
            'title' => 'Data pengaduan Masuk',
            'pengaduan' => $pengaduan
        ];

        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/layout/topbar', $data);
        $this->load->view('ro-petugas/pengaduan/pengaduan_masuk', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function verifikasi()
    {
        $data2 = [
            'pengaduan_id' => $this->input->post('pengaduan_id'),
            'pengaduan_status' => 'Proses'
        ];

        $this->pengaduan_model->update_status($data2);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Berhasil Melakukan Verifikasi Data Pengaduan</div>');
        redirect('ro-petugas/index');
    }

    public function tanggapan()
    {
        $valid = $this->form_validation;
        $valid->set_rules('tanggapan_isi', 'Isi tanggapan', 'required', ['required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {
            $data = [
                'title' => 'Detail pengaduan ',
            ];

            $this->load->view('ro-petugas/layout/header', $data);
            $this->load->view('ro-petugas/layout/sidebar', $data);
            $this->load->view('ro-petugas/layout/topbar', $data);
            $this->load->view('ro-petugas/pengaduan/pengaduan_detail', $data);
            $this->load->view('ro-petugas/layout/footer', $data);
        } else {
            $data = [
                'tanggapan_isi' => $this->input->post('tanggapan_isi'),
                'tanggapan_pengaduan_id' => $this->input->post('pengaduan_id'),
                'tanggapan_petugas_id' => $this->session->userdata('id'),
                'tanggapan_tgl' => date('Y-m-d')
            ];

            $data2 = [
                'pengaduan_id' => $this->input->post('pengaduan_id'),
                'pengaduan_status' => 'Selesai'
            ];

            $this->tanggapan_model->create_tanggapan($data);
            $this->pengaduan_model->update_status($data2);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Berhasil Memberikan Tanggapan Pengaduan</div>');
            redirect('ro-petugas/index/pengaduan_proses');
        }
    }

    public function pengaduan_proses()
    {

        $data = [
            'title' => 'Data pengaduan Proses',
            'proses' => $this->pengaduan_model->pengaduan_proses()
        ];

        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/layout/topbar', $data);
        $this->load->view('ro-petugas/pengaduan/pengaduan_proses', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function pengaduan_selesai()
    {

        $data = [
            'title' => 'Data pengaduan Selesai',
            'selesai' => $this->pengaduan_model->pengaduan_selesai()
        ];

        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/layout/topbar', $data);
        $this->load->view('ro-petugas/pengaduan/pengaduan_selesai', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function generate_laporan()
    {
        if ($this->input->post('tgl_awal') == '') {
            $data = [
                'title' => 'Data Laporan',
            ];

            $this->load->view('ro-petugas/layout/header', $data);
            $this->load->view('ro-petugas/layout/sidebar', $data);
            $this->load->view('ro-petugas/layout/topbar', $data);
            $this->load->view('ro-petugas/laporan/generate', $data);
            $this->load->view('ro-petugas/layout/footer', $data);
        } else {
            $awal = $this->input->post('tgl_awal');
            $akhir = $this->input->post('tgl_akhir');

            $generate = $this->tanggapan_model->generate($awal, $akhir);
            $data = [
                'title' => 'Data Laporan',
                'laporan' => $generate
            ];

            $this->load->view('ro-petugas/layout/header', $data);
            $this->load->view('ro-petugas/layout/sidebar', $data);
            $this->load->view('ro-petugas/layout/topbar', $data);
            $this->load->view('ro-petugas/laporan/generate_laporan', $data);
            $this->load->view('ro-petugas/layout/footer', $data);
        }
    }

    public function generate()
    {
    }

    public function cek()
    {
        // $awal = '2021-03-01';
        // $akhir = '2021-03-10';

        $generate = $this->tanggapan_model->generate();
        var_dump($generate);
    }
}
