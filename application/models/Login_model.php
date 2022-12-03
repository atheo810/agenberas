<?php 
 
class Login_model extends CI_Model{
private $_table = "tabel_user";	
	function cek_login($username, $password){
	 		
	 return $this->db->get_where($this->_table, ["username" => $username, "password"=> $password])->num_rows();

	}	
}
?>