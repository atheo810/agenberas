<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    private $_table = "tabel_supplier";

    public $id_supplier;
    public $nama_supplier;
    public $alamat_supplier;
    public $tlp_supplier;
    

    public function rules()
    {
        return [
            ['field' => 'nama_supplier',
            'label' => 'alamat_supplier',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_supplier" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_supplier = uniqid();
        $this->nama_supplier = $post["nama_supplier"];
        $this->alamat_supplier = $post["alamat_supplier"];
        $this->tlp_supplier = $post["tlp_supplier"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_supplier = $post["id_supplier"];
        $this->nama_supplier = $post["nama_supplier"];
        $this->alamat_supplier = $post["alamat_supplier"];
        $this->tlp_supplier = $post["tlp_supplier"];
        return $this->db->update($this->_table, $this, array('id_supplier' => $post['id_supplier']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_supplier" => $id));
    }
}
?>