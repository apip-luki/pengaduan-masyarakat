<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login_petugas($user, $pass)
    {
        return $this->db->query("call login_petugas('$user', '$pass')");
    }

    public function get_petugas()
    {
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->order_by('petugas_id', 'asc');

        return $this->db->get()->result();
    }

    public function detail($petugas_id)
    {
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->where('petugas_id', $petugas_id);

        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $this->db->insert('tb_petugas', $data);
    }

    public function update($data)
    {
        $this->db->where('petugas_id', $data['petugas_id']);
        $this->db->update('tb_petugas', $data);
    }

    public function update_pass($data2)
    {
        $this->db->where('petugas_id', $data2['petugas_id']);
        $this->db->update('tb_petugas', $data2);
    }

    public function delete($data)
    {
        $this->db->where('petugas_id', $data['petugas_id']);
        $this->db->delete('tb_petugas', $data);
    }
}
