<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('tampilan_login');
	}

	public function cek_login()
	{	
		
			//cek ke database apakah ada kombinasi username dan password yg cocok
			$data = array('username' => $this->input->post('username', TRUE),
						  'password' => $this->input->post('password', TRUE)
						 );
			
			$this->load->model('model_login'); 
			$hasil = $this->model_login->cek_user($data);
			if ($hasil->num_rows() == 1) 
			{
				foreach ($hasil->result() as $sess) 
				{
					$sess_data['logged_in'] = 'Sudah Login';
					$sess_data['id'] = $sess->id;
					$sess_data['username'] = $sess->username;
					$sess_data['password'] = $sess->password;
					$sess_data['level'] = $sess->level;
					$this->session->set_userdata($sess_data);
					//$notif=$this->session->set_flashdata('notif','Anda Berhasil Login');
				}
				
				if ($this->session->userdata('level')=='user') 
				{
					//$notif;
					//$this->session->flashdata("info","Anda Berhasil Login");
					redirect('home_user');
				}
				else if ($this->session->userdata('level')=='admin') 
				{
					//$notif;
					//$this->session->set_flashdata('notif','Anda Berhasil Logout :v');
					redirect('home');
				}
				else
				{
					redirect('login');
				}
					
			}
			else 
			{
				$this->session->set_flashdata("info", "<div class='alert bg-danger' role='alert' align='left' style='color:red;'><span class='glyphicon glyphicon-exclamation-sign'></span>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Maaf, Username Atau Password Anda Salah!
			    </div>");
			    redirect('login','refresh');	
			}	
				
		}

	public function logout()
	{

		$this->session->session_destroy('id');
		$this->session->session_destroy('username');
		$this->session->session_destroy('password');
		$this->session->session_destroy('level');
        redirect('login');
	}

	public function getlogin()
	{

		$u=$this->input->post('username');
		$p=$this->input->post('password');
		$this->load->model('model_login');
		$this->model_login->getlogin($u,$p);
	}

}
