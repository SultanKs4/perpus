<!-- Jobsheet 5 Praktikum Bagian 1 Langkah 19 -->
<?php

use GuzzleHttp\Exception\GuzzleException;

defined('BASEPATH') or exit('No direct script access allowed');

class buku extends CI_Controller
{
    private $client;

    public function __construct()
    {
        parent::__construct();

        $this->client = new GuzzleHttp\Client(['base_uri' => base_url() . "api/"]);

        if ($this->session->userdata('level') == null) {
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        try {
            $response = $this->client->get('buku');
            if ($response->getStatusCode() == 200) {
                $body = json_decode($response->getBody()->getContents(), true);
                $data['title'] = 'Data Buku';
                $data['buku'] = $body['data'];
                $this->load->view('template/header_datatables_user', $data);
                $this->load->view('buku/index', $data);
                $this->load->view('template/footer_datatables_user');
            }
        } catch (GuzzleException $th) {
            echo "data tidak ada";
        }
    }
}
    
    /* End of file user.php */