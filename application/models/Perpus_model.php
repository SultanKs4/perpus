<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perpus_model extends CI_Model
{
    public function checkLogin($username, $password)
    {
        $this->db->select('id, username, level');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get('anggota');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getTable($table, $tableid, $id = null)
    {
        if ($id == null) {
            return $this->db->get($table)->result_array();
        } else {
            return $this->db->get_where($table, [$tableid => $id])->result_array();
        }
    }

    public function insertTable($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function updateTable($table, $tableid, $data, $id)
    {
        $this->db->update($table, $data, [$tableid => $id]);
        return $this->db->affected_rows();
    }

    public function deleteTable($table, $tableid, $id)
    {
        $this->db->delete($table, [$tableid => $id]);
        return $this->db->affected_rows();
    }

    public function getBuku($id = null)
    {
        $this->db->select('buku.id, buku.judul, buku.penerbit, buku.penulis, kategori.nama as kategori, buku.rak');
        $this->db->from('buku');
        $this->db->join('kategori', 'buku.idkategori = kategori.id');
        $this->db->order_by('id', 'asc');

        if ($id == null) {
            return $this->db->get()->result_array();
        } else {
            $this->db->where('buku.id', $id);
            return $this->db->get()->result_array();
        }
    }

    public function getAnggota($id = null)
    {
        $this->db->select('anggota.id, anggota.nama, anggota.alamat, anggota.telepon, level.level, anggota.username');
        $this->db->from('anggota');
        $this->db->join('level', 'anggota.level = level.id');
        $this->db->order_by('id', 'asc');

        if ($id == null) {
            return $this->db->get()->result_array();
        } else {
            $this->db->where('anggota.id', $id);
            return $this->db->get()->result_array();
        }
    }
}
    
    /* End of file Perpus_model.php */