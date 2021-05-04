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

	public function process(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
			die();
		}
		$bsalary = $this->input->post('bsalary');
		$amount  = $this->input->post('amount');
		$heslb   = $this->input->post('heslb');

		$errors = [];
		$data   = [];

		if(empty($bsalary)){
			$errors['bsalary'] = 'Basic Salary is Required';
		}
		if($amount == 'true' && empty($amount)){
			$errors['amount'] = 'Allowance Amount is Required';
		}

		if (!empty($errors)) {
		    $data['success'] = false;
		    $data['errors'] = $errors;
		} else {
		    $data['success'] = true;
		    $data['message'] = 'Success!';
		}

		echo json_encode($data);
	}
}
