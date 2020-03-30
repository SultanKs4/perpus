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
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody()->getContents(), true);
            $data['title'] = 'Data Buku';
            $data['buku'] = $body['data'];
            $this->load->view('template/header', $data);
            $this->load->view('buku/index', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        try {
            $response = $this->client->get('buku?id=' . $id);
            $responseKategori = $this->client->get('kategori');
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody()->getContents(), true);
            $bodyKategori = json_decode($responseKategori->getBody()->getContents(), true);
            $data['title'] = 'Form Edit Data Buku';
            $data['buku'] = $body['data'][0];
            $data['kategori'] = $bodyKategori['data'];

            $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
            $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
            $this->form_validation->set_rules('penulis', 'Penulis', 'trim|required');
            $this->form_validation->set_rules('rak', 'Rak', 'trim|required');
            $this->form_validation->set_rules('idkategori', 'Kategori', 'trim|required|numeric');
            if ($this->form_validation->run() ==  FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('buku/edit', $data);
                $this->load->view('template/footer');
            } else {
                try {
                    $response = $this->client->put('buku', [
                        'form_params' => [
                            'id' => $this->input->post('id'),
                            'idkategori' => $this->input->post('idkategori'),
                            'judul' => $this->input->post('judul'),
                            'penerbit' => $this->input->post('penerbit'),
                            'penulis' => $this->input->post('penulis'),
                            'rak' => $this->input->post('rak')
                        ]
                    ]);
                } catch (GuzzleException $th) {
                    echo $th->getMessage();
                    return null;
                }
                if ($response->getStatusCode() == 200) {
                    $this->session->set_flashdata('flash-data', 'diedit');
                    redirect('buku', 'refresh');
                }
            }
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete('buku', [
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
            redirect('buku', 'refresh');
        }
    }

    public function add()
    {
        try {
            $responseKategori = $this->client->get('kategori');
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($responseKategori->getStatusCode() == 200) {
            $bodyKategori = json_decode($responseKategori->getBody()->getContents(), true);
            $data['title'] = 'Form Menambahkan Data Buku';
            $data['kategori'] = $bodyKategori['data'];

            $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
            $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
            $this->form_validation->set_rules('penulis', 'Penulis', 'trim|required');
            $this->form_validation->set_rules('rak', 'Rak', 'trim|required');
            $this->form_validation->set_rules('idkategori', 'Kategori', 'trim|required|numeric');
            if ($this->form_validation->run() ==  FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('buku/add', $data);
                $this->load->view('template/footer');
            } else {
                try {
                    $response = $this->client->post('buku', [
                        'form_params' => [
                            'idkategori' => $this->input->post('idkategori'),
                            'judul' => $this->input->post('judul'),
                            'penerbit' => $this->input->post('penerbit'),
                            'penulis' => $this->input->post('penulis'),
                            'rak' => $this->input->post('rak')
                        ]
                    ]);
                } catch (GuzzleException $th) {
                    echo $th->getMessage();
                    return null;
                }
                if ($response->getStatusCode() == 201) {
                    $this->session->set_flashdata('flash-data', 'ditambahkan');
                    redirect('buku', 'refresh');
                }
            }
        }
    }
}
    
    /* End of file Buku.php */