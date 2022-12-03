<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    private $_table = "tabel_pelanggan";

    public $id_pelanggan;
    public $nama_pelanggan;
    public $alamat_pelanggan;
    public $no_telepon;
    public $point;

    public function rules()
    {
        return [
            ['field' => 'nama_pelanggan',
            'label' => 'alamat_pelanggan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pelanggan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pelanggan = uniqid();
        $this->nama_pelanggan = $post["nama_pelanggan"];
        $this->alamat_pelanggan = $post["alamat_pelanggan"];
        $this->no_telepon = $post["no_telepon"];
        $this->point = $post["point"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pelanggan = $post["id_pelanggan"];
        $this->nama_pelanggan = $post["nama_pelanggan"];
        $this->alamat_pelanggan = $post["alamat_pelanggan"];
        $this->no_telepon = $post["no_telepon"];
        $this->point = $post["point"];
        return $this->db->update($this->_table, $this, array('id_pelanggan' => $post['id_pelanggan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pelanggan" => $id));
    }
}
?>