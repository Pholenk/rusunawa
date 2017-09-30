<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		
		$this->load->view('tampilan_user','v_about');
	}
	
}
