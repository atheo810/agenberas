<?php

class Auth_model extends CI_Model
{
	private $_table = "tabel_user";
	const SESSION_KEY = 'id_user';

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

	public function login($username, $password)
	{
		$this->db->where('email', $username)->or_where('username', $username);
		$query = $this->db->get($this->_table);
		$tabel_user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$tabel_user) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $tabel_user->password)) {
			return FALSE;
		}

		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $tabel_user->id_user]);
		$this->_update_last_login($tabel_user->id_user);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$id_user = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id_user' => $tabel_user_id_user]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	private function _update_last_login($id_user)
	{
		$data = [
			'last_login' => date("Y-m-d H:i:s"),
		];

		return $this->db->update($this->_table, $data, ['id_user' => $id_user]);
	}
}