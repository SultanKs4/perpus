<!-- Jobsheet 5 Praktikum Bagian 1 Langkah 19 -->
<?php

use GuzzleHttp\Exception\GuzzleException;

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    private $client;

    public function __construct()
    {
        parent::__construct();

        $this->client = new GuzzleHttp\Client(['base_uri' => base_url() . "api/"]);

        if (intval($this->session->userdata('level'))  < 2) {
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        try {
            $response = $this->client->get('kategori');
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody()->getContents(), true);
            $data['title'] = 'Data Kategori';
            $data['kategori'] = $body['data'];
            $this->load->view('template/header', $data);
            $this->load->view('kategori/index', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        try {
            $response = $this->client->get('kategori?id=' . $id);
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody()->getContents(), true);
            $data['title'] = 'Form Edit Data Buku';
            $data['kategori'] = $body['data'][0];

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
            if ($this->form_validation->run() ==  FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('kategori/edit', $data);
                $this->load->view('template/footer');
            } else {
                try {
                    $response = $this->client->put('kategori', [
                        'form_params' => [
                            'id' => $this->input->post('id'),
                            'nama' => $this->input->post('nama'),
                            'keterangan' => $this->input->post('keterangan')
                        ]
                    ]);
                } catch (GuzzleException $th) {
                    echo $th->getMessage();
                    return null;
                }
                if ($response->getStatusCode() == 200) {
                    $this->session->set_flashdata('flash-data', 'diedit');
                    redirect('kategori', 'refresh');
                }
            }
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete('kategori', [
                'form_params' => [
                    'id' => $id
                ]
            ]);
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
            $this->session->set_flashdata('flash-data', 'dihapus');
            redirect('kategori', 'refresh');
        }
    }

    public function add()
    {
        $data['title'] = 'Form Menambahkan Data Kategori';

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() ==  FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('kategori/add', $data);
            $this->load->view('template/footer');
        } else {
            try {
                $response = $this->client->post('kategori', [
                    'form_params' => [
                        'nama' => $this->input->post('nama'),
                        'keterangan' => $this->input->post('keterangan')
                    ]
                ]);
            } catch (GuzzleException $th) {
                echo $th->getMessage();
                return null;
            }
            if ($response->getStatusCode() == 201) {
                $this->session->set_flashdata('flash-data', 'ditambahkan');
                redirect('kategori', 'refresh');
            }
        }
    }
}
    
    /* End of file user.php */