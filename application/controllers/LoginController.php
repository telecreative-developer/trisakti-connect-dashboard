<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function login_valid(){
		$username    = $this->input->post('username');
		$password 	 = md5($this->input->post('password'));
		$level = 'admin';

	
		$data = array(
			'password'  => $password,
			'username' 	=> $username,
			'level' => $level
		  	
		  );
		$cek_login    = $this->Login->Login_valid($data);
		  if ($cek_login->num_rows() > 0) {
			  foreach ($cek_login->result() as $sess) {
				  $sess_data['id'] 		= $sess->id;
				  $sess_data['username'] 	= $sess->username;
				  $sess_data['picture'] 	= $sess->picture;
				  $x = $this->session->set_userdata($sess_data);
			  }
			  echo "<script>alert('Sukses Login');</script>";
			  redirect('dashboard');
		
		  }

		  
		else{
			$this->session->set_flashdata('wrong','Username Atau Password Salah');
			redirect('trisakti_logadmin');
		}

 	}  

	public function index()
	{
		$this->load->view('login/header');
		$this->load->view('login/login');
		error_reporting(0);
	}

	

}
