<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanggapan_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_tanggapan($data)
    {
        $this->db->insert('tb_tanggapan', $data);
    }

    public function generate($awal, $akhir)
    {
        $this->db->select('tb_tanggapan.*, tb_pengaduan.*, tb_masyarakat.*, tb_petugas.*');
        $this->db->from('tb_tanggapan');

        $this->db->join('tb_pengaduan', 'tb_pengaduan.pengaduan_id = tb_tanggapan.tanggapan_pengaduan_id', 'left');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.masyarakat_nik = tb_pengaduan.pengaduan_nik', 'left');
        $this->db->join('tb_petugas', 'tb_petugas.petugas_id =  tb_tanggapan.tanggapan_petugas_id', 'left');

        $this->db->where('pengaduan_tgl >=', $awal);
        $this->db->where('pengaduan_tgl <=', $akhir);

        return $this->db->get()->result();
    }

    public function coba($awal, $akhir)
    {
        return $this->db->query("SELECT * FROM tb_pengaduan WHERE pengaduan_tgl BETWEEN '$awal' and '$akhir'")->result();
    }
}
