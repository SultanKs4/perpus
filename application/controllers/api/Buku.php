<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Buku extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('perpus_model', 'perpus');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === NULL) {
            $kategori = $this->perpus->getBuku();
        } else {
            $kategori = $this->perpus->getBuku($id);
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
            'idkategori' => $this->post('idkategori'),
            'judul' => $this->post('judul'),
            'penerbit' => $this->post('penerbit'),
            'penulis' => $this->post('penulis')
        ];

        if ($this->perpus->insertTable('buku', $data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data buku dibuat'
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
            'idkategori' => $this->put('idkategori'),
            'judul' => $this->put('judul'),
            'penerbit' => $this->put('penerbit'),
            'penulis' => $this->put('penulis')
        ];

        if ($this->perpus->updateTable('buku', 'id', $data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data buku Diupdate'
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
            if ($this->perpus->deleteTable('buku', 'id', $id) > 0) {
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