<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Anggota extends RestController
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('perpus_model', 'perpus');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === NULL) {
            $anggota = $this->perpus->getAnggota();
        } else {
            $anggota = $this->perpus->getAnggota($id);
        }

        if ($anggota) {
            $this->response([
                'status' => TRUE,
                'data' => $anggota
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Tidak Ditemukan buku'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'telepon' => $this->post('telepon'),
            'level' => $this->post('level'),
            'username' => $this->post('username'),
            'password' => md5($this->post('password'))
        ];

        if ($this->perpus->insertTable('anggota', $data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data anggota dibuat'
            ], RestController::HTTP_CREATED);
        } else {
            //id not found
            $this->response([
                'status' => true,
                'message' => 'Gagal membuat data buku baru'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'telepon' => $this->put('telepon'),
            'level' => $this->put('level'),
            'username' => $this->put('username'),
            'password' => md5($this->put('password'))
        ];

        if ($this->perpus->updateTable('anggota', 'id', $data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data anggota diupdate'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal mengupdate data'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'Berikan id yang valid'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->perpus->deleteTable('anggota', 'id', $id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Sukses Terhapus'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'ID Tidak ditemukan'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }
}