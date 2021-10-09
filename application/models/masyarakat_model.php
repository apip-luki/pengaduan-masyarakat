<?php
defined('BASEPATH') or exit('No direct script access allowes');

class Masyarakat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($user, $pass)
    {
        return $this->db->query("call login_masyarakat('$user', '$pass')");
    }

    public function register($data)
    {
        $this->db->insert('tb_masyarakat', $data);
    }

    public function report($data)
    {
        $this->db->insert('tb_pengaduan', $data);
    }

    public function get_history()
    {
        $this->db->select('tb_pengaduan.*, tb_masyarakat.*');
        $this->db->from('tb_pengaduan');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.masyarakat_nik = tb_pengaduan.pengaduan_nik', 'left');
        $this->db->order_by('pengaduan_id', 'desc');
        $this->db->limit('5');

        return $this->db->get()->result();
    }
}
