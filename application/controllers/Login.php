<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('Login_model');
 		$this->load->helper('url');
	}
 
	public function index(){
		/*print_r(base_url());
		print_r(site_url());exit;*/
		$this->load->view('login');
		/*$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($username==null or $password==null) {
		$this->load->view('login');
		}else  {
			
		
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->Login_model->cek_login($username,md5($password));
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}*/
}

 
	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);

		$cek = $this->Login_model->cek_login($username,md5($password));
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(site_url("admin"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login.php'));
	}
}