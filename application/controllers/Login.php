<!-- Jobsheet 5 Praktikum Bagian 1 Langkah 2 -->
<?php

use GuzzleHttp\Exception\GuzzleException;

defined('BASEPATH') or exit('No direct sricpt access allowed');

class login extends CI_Controller
{
    private $client;

    // Jobsheet 5 Praktikum Bagian 1 Langkah 9
    public function __construct()
    {
        parent::__construct();
        $this->client = new GuzzleHttp\Client(['base_uri' => base_url() . "api/"]);
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('template/header_login', $data);
        $this->load->view('login/index');
        $this->load->view('template/footer');
    }

    // Jobsheet 5 Praktikum Bagian 1 Langkah 10
    public function proses_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        try {
            $response = $this->client->post('login/check', [
                'form_params' => [
                    'username' => $username,
                    'password' => $password
                ]
            ]);
            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody()->getContents(), true);
                foreach ($data['data'] as $key) {
                    $this->session->set_userdata('user', $key['username']);
                    $this->session->set_userdata('level', $key['level']);
                    $this->session->set_userdata('user_id', $key['id']);
                }

                redirect('buku');
            }
        } catch (GuzzleException $th) {
            // Jobsheet 5 Praktikum Bagian 1 Langkah 16
            $data['pesan'] = "username dan password anda salah";
            $data['title'] = 'Login';
            $this->load->view('template/header_login', $data);
            $this->load->view('login/index');
            $this->load->view('template/footer');
            // redirect('login/index', 'refresh');
        }
    }
    // Jobsheet 5 Langkah 1 Bagian 22
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}