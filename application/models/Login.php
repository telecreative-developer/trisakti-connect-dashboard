<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Model{

	public function Login_valid($data){		
	$query =$this->db->get_where('admin',$data);
	return $query;	
	
	}
}