<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_login extends CI_Model {

	

	public function cek_user($data)
	{
		//SELECT * FROM user WHERE username = '$username' AND password ='$password'"
		$query = $this->db->get_where('admin', $data);
		return $query;
	}

	// public function getlogin($u,$p)
	// {
	// 	$pwd=md5($p);
	// 	$this->db->where('username',$u);
	// 	$this->db->where('password',$pwd);
	// 	$query=$this->db->get('admin');

	// 	if($query->num_rows()>0)
	// 	{
	// 		foreach($query->result() as $row){

	// 			$sess  = array('username' => $row->username);
	// 			$this->session->set_userdata($sess);
	// 			redirect('home');
	// 		}

	// 	}
	// 	else{

	// 		$this->session->set_flashdata('info','maaf username atau password Anda salah !');
	// 		redirect('login');
	// 	}
	// }
}
