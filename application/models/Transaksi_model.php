<?php

/**
 * 
 */
class Transaksi_model extends CI_Model
{
	public function transaksi(){
		$this->db->select('*');
		$this->db->from('tabel_transaksi');      
        $query = $this->db->get();
        return $query;
	}

}
?>