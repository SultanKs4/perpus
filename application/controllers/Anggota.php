<!-- Jobsheet 5 Praktikum Bagian 1 Langkah 19 -->
<?php

use GuzzleHttp\Exception\GuzzleException;

defined('BASEPATH') or exit('No direct script access allowed');

class anggota extends CI_Controller
{
    private $client;

    public function __construct()
    {
        parent::__construct();

        $this->client = new GuzzleHttp\Client(['base_uri' => base_url() . "api/"]);

        if ($this->session->userdata('level') != "3") {
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        try {
            $response = $this->client->get('anggota');
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody()->getContents(), true);
            $data['title'] = 'Data Anggota';
            $data['anggota'] = $body['data'];
            $this->load->view('template/header', $data);
            $this->load->view('anggota/index', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        try {
            $response = $this->client->get('anggota?id=' . $id);
            $responseLevel = $this->client->get('level');
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody()->getContents(), true);
            $bodyLevel = json_decode($responseLevel->getBody()->getContents(), true);
            $data['title'] = 'Form Edit Data anggota';
            $data['anggota'] = $body['data'][0];
            $data['level'] = $bodyLevel['data'];

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric');
            $this->form_validation->set_rules('level', 'Level', 'trim|required|numeric');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() ==  FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('anggota/edit', $data);
                $this->load->view('template/footer');
            } else {
                try {
                    $response = $this->client->put('anggota', [
                        'form_params' => [
                            'id' => $this->input->post('id'),
                            'nama' => $this->input->post('nama'),
                            'alamat' => $this->input->post('alamat'),
                            'telepon' => $this->input->post('telepon'),
                            'level' => $this->input->post('level'),
                            'username' => $this->input->post('username'),
                            'password' => $this->input->post('password')
                        ]
                    ]);
                } catch (GuzzleException $th) {
                    echo $th->getMessage();
                    return null;
                }
                if ($response->getStatusCode() == 200) {
                    $this->session->set_flashdata('flash-data', 'diedit');
                    redirect('anggota', 'refresh');
                }
            }
        }
    }

    public function delete($id)
    {
        try {
            $response = $this->client->delete('anggota', [
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
            redirect('anggota', 'refresh');
        }
    }

    public function add()
    {
        try {
            $responseKategori = $this->client->get('kategori');
            $responseLevel = $this->client->get('level');
        } catch (GuzzleException $th) {
            echo $th->getMessage();
            return null;
        }
        if ($responseKategori->getStatusCode() == 200) {
            $bodyKategori = json_decode($responseKategori->getBody()->getContents(), true);
            $bodyLevel = json_decode($responseLevel->getBody()->getContents(), true);
            $data['title'] = 'Form Menambahkan Data anggota';
            $data['kategori'] = $bodyKategori['data'];
            $data['level'] = $bodyLevel['data'];

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric');
            $this->form_validation->set_rules('level', 'Level', 'trim|required|numeric');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() ==  FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('anggota/add', $data);
                $this->load->view('template/footer');
            } else {
                try {
                    $response = $this->client->post('anggota', [
                        'form_params' => [
                            'nama' => $this->input->post('nama'),
                            'alamat' => $this->input->post('alamat'),
                            'telepon' => $this->input->post('telepon'),
                            'level' => $this->input->post('level'),
                            'username' => $this->input->post('username'),
                            'password' => $this->input->post('password')
                        ]
                    ]);
                } catch (GuzzleException $th) {
                    echo $th->getMessage();
                    return null;
                }
                if ($response->getStatusCode() == 201) {
                    $this->session->set_flashdata('flash-data', 'ditambahkan');
                    redirect('anggota', 'refresh');
                }
            }
        }
    }
}
    
    /* End of file user.php */