<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Kategori extends RestController
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
            $kategori = $this->perpus->getTable('kategori', 'id');
        } else {
            $kategori = $this->perpus->getTable('kategori', 'id', $id);
        }

        if ($kategori) {
            $this->response([
                'status' => TRUE,
                'data' => $kategori
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
            'keterangan' => $this->post('keterangan')
        ];

        if ($this->perpus->insertTable('kategori', $data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data kategori dibuat'
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
            'keterangan' => $this->put('keterangan')
        ];

        if ($this->perpus->updateTable('kategori', 'id', $data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data kategori diupdate'
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
            if ($this->perpus->deleteTable('kategori', 'id', $id) > 0) {
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