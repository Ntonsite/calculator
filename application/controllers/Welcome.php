<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() 
	{
	    parent:: __construct();
	    
	    $data['title'] = 'Loan | Calculator'; 
	    $this->load->view('includes/header', $data);
	    $this->load->view('includes/footer',$data);
	}

	public function index()
	{
		
		$this->load->view('welcome_message');
	}

	public function collateral(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
			die();
		}

		$netco      = $this->input->post('net');
		$loanco     = $this->input->post('loan');
		$maturityco = $this->input->post('maturity');

		$errors = [];
		$data   = [];

		if(empty($netco)){
			$errors['netco'] = 'Net Salary is required';
		}
		if(empty($loanco)){
			$errors['loanco'] = 'Loan Amount is required';
		}
		if(empty($maturityco)){
			$errors['maturityco'] = 'Matuity is required';
		}
		if (!empty($errors)) {
		    $data['success'] = false;
		    $data['errors'] = $errors;
		} else {
		    $data['success'] = true;
		    $data['message'] = 'Success!';
		}

		$maximum_loan = 6* $netco;
		$data['maximumLoan'] = $maximum_loan;

		$maximum_installment = 0.4 * $netco;
		$data['maximumInstall'] = $maximum_installment;

		$interest = 0.01;

		$amount = $interest * -$loanco * pow((1 + $interest), $maturityco) / (1 - pow((1 + $interest), $maturityco));

		$data ['annuity'] = round($amount,2);

		echo json_encode($data);
	}

	public function generate(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		if ( "OPTIONS" === $_SERVER['REQUEST_METHOD'] ) {
			die();
		}

		$net = $this->input->post('net');
		$loan = $this->input->post('loan');
		$maturity = $this->input->post('maturity');

		$errors = [];
		$data   = [];

		if(empty($net)){
			$errors['net'] = 'Net Salary is required';
		}
		if(empty($loan)){
			$errors['loan'] = 'Loan Amount is required';
		}
		if (!empty($errors)) {
		    $data['success'] = false;
		    $data['errors'] = $errors;
		} else {
		    $data['success'] = true;
		    $data['message'] = 'Success!';
		}

		$maximum_loan = 6* $net;
		$data['maximumLoan'] = $maximum_loan;

		$maximum_installment = 0.4 * $net;
		$data['maximumInstall'] = $maximum_installment;

		$interest = 0.012;

		$amount = $interest * -$loan * pow((1 + $interest), $maturity) / (1 - pow((1 + $interest), $maturity));

		$data ['annuity'] = round($amount,2);
		echo json_encode($data);
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
		$tuico   = $this->input->post('tuico');

		$errors = [];
		$data   = [];

		if(empty($bsalary)){
			$errors['bsalary'] = 'Basic Salary is Required';
		}
		
		if (!empty($errors)) {
		    $data['success'] = false;
		    $data['errors'] = $errors;
		} else {
		    $data['success'] = true;
		    $data['message'] = 'Success!';
		}

		if($amount == 'false')
		{
			$amount = 0;
		}

		if($tuico=='false'){
			$tuico = 0;
		}

		if($heslb == 'false')
		{
			$heslb = 0;
		}
		$gross = $bsalary + $amount;

		$data['gross'] = $gross;

		$mfuko = 0.1 * $bsalary;
		$data['mfuko'] = $mfuko;

		$taxable = $gross - $mfuko;
		$data['taxable'] = $taxable;

		$staff   = 3000;

		switch($taxable){
			case $taxable > 1000000:
			$value = (($taxable - 1000000)*0.3+130500);
			$result = $gross - $mfuko - $value - $heslb - $tuico - $staff;
			$data['result'] = $result;
			break;

			case $taxable > 760000:
			$value = (($taxable - 760000)*0.25+70500);
			$result = $gross - $mfuko - $value - $heslb - $tuico - $staff;
			$data['result'] = $result;
			break;

			case $taxable > 520000:
			$value = (($taxable - 520000)*0.2+22500);
			$result = $gross - $mfuko - $value - $heslb - $tuico - $staff;
			$data['result'] = $result;
			break;

			case $taxable > 270000:
			$value = (($taxable - 270000)*0.9);
			$result = $gross - $mfuko - $value - $heslb - $tuico - $staff;
			$data['result'] =  $result;
			break; 
		}
		echo json_encode($data);		
	}
}
