<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pelanggan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pelanggan"] = $this->Pelanggan_model->getAll();
        $this->load->view("pelanggan", $data);
    }

    public function tambah_pelanggan()
    {
        $pelanggan = $this->Pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("tambah_pelanggan");
    }

    public function edit_pelanggan($id = null)
    {
        if (!isset($id)) redirect('pelanggan');
       
        $pelanggan = $this->Pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pelanggan"] = $pelanggan->getById($id);
        if (!$data["pelanggan"]) show_404();
        
        $this->load->view("edit_pelanggan", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pelanggan_model->delete($id)) {
            redirect(site_url('pelanggan'));
        }
    }

}
?>