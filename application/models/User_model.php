<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tabel_user";

    public $id_user;
    public $nama;
    public $username;
    public $password;
    public $email;
    public $level;
    

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'username',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_user = uniqid();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->email = $post["email"];
        $this->level = $post["level"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id_user"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->email = $post["email"];
        $this->level = $post["level"];
        return $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }
}
?>