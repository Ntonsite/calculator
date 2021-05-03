<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Loan | Calculator'; 
		$this->load->view('includes/header', $data);
		$this->load->view('welcome_message');
		$this->load->view('includes/footer',$data);
	}
}
