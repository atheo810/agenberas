<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["supplier"] = $this->Supplier_model->getAll();
        $this->load->view("supplier", $data);
    }

    public function tambah_supplier()
    {
        $supplier = $this->Supplier_model;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());

        if ($validation->run()) {
            $supplier->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("tambah_supplier");
    }

    public function edit_supplier($id = null)
    {
        if (!isset($id)) redirect('supplier');
       
        $supplier = $this->Supplier_model;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());

        if ($validation->run()) {
            $supplier->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["supplier"] = $supplier->getById($id);
        if (!$data["supplier"]) show_404();
        
        $this->load->view("edit_supplier", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->supplier_model->delete($id)) {
            redirect(site_url('supplier'));
        }
    }

}
?>