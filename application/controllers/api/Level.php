<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Level extends RestController
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
            $level = $this->perpus->getTable('level', 'id');
        } else {
            $level = $this->perpus->getTable('level', 'id', $id);
        }

        if ($level) {
            $this->response([
                'status' => TRUE,
                'data' => $level
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Tidak Ditemukan level'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}