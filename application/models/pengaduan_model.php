<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function pengaduan_masuk()
    {
        $this->db->select('tb_pengaduan.*, tb_masyarakat.*');
        $this->db->from('tb_pengaduan');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.masyarakat_nik = tb_pengaduan.pengaduan_nik', 'left');
        $this->db->where('pengaduan_status', '0');

        return $this->db->get()->result();
    }

    public function pengaduan_detail($pengaduan_id)
    {
        $this->db->select('tb_pengaduan.*, tb_masyarakat.*');
        $this->db->from('tb_pengaduan');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.masyarakat_nik = tb_pengaduan.pengaduan_nik', 'left');
        $this->db->where('pengaduan_id', $pengaduan_id);

        return $this->db->get()->row();
    }

    public function pengaduan_proses()
    {
        $this->db->select('tb_pengaduan.*, tb_masyarakat.*');
        $this->db->from('tb_pengaduan');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.masyarakat_nik = tb_pengaduan.pengaduan_nik', 'left');
        $this->db->where('pengaduan_status', 'Proses');

        return $this->db->get()->result();
    }

    public function pengaduan_selesai()
    {
        $this->db->select('tb_pengaduan.*, tb_masyarakat.*, tb_tanggapan.*, tb_petugas.*');
        $this->db->from('tb_tanggapan');
        $this->db->join('tb_pengaduan', 'tb_pengaduan.pengaduan_id = tb_tanggapan.tanggapan_pengaduan_id', 'left');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.masyarakat_nik = tb_pengaduan.pengaduan_nik', 'left');
        $this->db->join('tb_petugas', 'tb_petugas.petugas_id = tb_tanggapan.tanggapan_petugas_id');
        // $this->db->where('pengaduan_status', 'Selesai');

        return $this->db->get()->result();
    }
    public function update_status($data2)
    {
        $this->db->where('pengaduan_id', $data2['pengaduan_id']);
        $this->db->update('tb_pengaduan', $data2);
    }
}
