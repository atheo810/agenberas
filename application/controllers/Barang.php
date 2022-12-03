<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["barang"] = $this->Barang_model->getAll();
        $this->load->view("barang", $data);
    }

    public function tambah_barang()
    {
        $barang = $this->Barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("tambah_barang");
    }

    public function edit_barang($id = null)
    {
        if (!isset($id)) redirect('barang');
       
        $barang = $this->Barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["barang"] = $barang->getById($id);
        if (!$data["barang"]) show_404();
        
        $this->load->view("edit_barang", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->barang_model->delete($id)) {
            redirect(site_url('barang'));
        }
    }

}
?>