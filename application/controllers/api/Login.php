<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Login extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('perpus_model', 'perpus');
    }

    public function check_post()
    {
        $username = $this->post('username');
        $password = md5($this->post('password'));

        $data = $this->perpus->checkLogin($username, $password);
        if ($data != false) {
            $this->response([
                'status' => true,
                'message' => 'Username dan password benar',
                'data' => $data
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Username dan Password salah',
            ], RestController::HTTP_FORBIDDEN);
        }
    }
}