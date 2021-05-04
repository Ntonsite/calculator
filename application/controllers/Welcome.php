<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() 
	{
	    parent:: __construct();
	    $this->load->library('excel');
	}

	public function index()
	{
		$data['title'] = 'Loan | Calculator'; 
		$this->load->view('includes/header', $data);
		$this->load->view('welcome_message');
		$this->load->view('includes/footer',$data);
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
		$maximum_installment = 0.4 * $net;
		$interest = 0.012;

		//call a method to calculate Annuity
		interestAndPrincipal($interest, 0, $maturity,$loan, 0, 0);
		echo json_encode($data);
	}
	public function interestAndPrincipal($rate=0, $per=0, $nper=0, $pv=0, $fv=0, $type=0)
	{
		$pmt = self::PMT($rate, $nper, $pv, $fv, $type);
		$capital = $pv;
		for ($i = 1; $i<= $per; ++$i) {
			$interest = ($type && $i == 1) ? 0 : -$capital * $rate;
			$principal = $pmt - $interest;
			$capital += $principal;
		}

		$data = [
			$interest=>$principal
		];
		return $data;
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

		if($heslb == 'false')
		{
			$heslb = 0;
		}
		$gross = $bsalary + $amount;
		$mfuko = 0.1* $bsalary;

		$taxable = $gross - $mfuko;

		$staff   = 3000;

		switch($taxable){
			case $taxable > 1000000:
			$value = (($taxable - 1000000)*0.3+130500);
			$result = $gross - $mfuko - $value - $heslb - $staff;
			$data['result'] = $result;
			break;

			case $taxable > 760000:
			$value = (($taxable - 760000)*0.25+70500);
			$result = $gross - $mfuko - $value - $heslb - $staff;
			$data['result'] = $result;
			break;

			case $taxable > 520000:
			$value = (($taxable - 520000)*0.2+22500);
			$result = $gross - $mfuko - $value - $heslb - $staff;
			$data['result'] = $result;
			break;

			case $taxable > 270000:
			$value = (($taxable - 270000)*0.9);
			$result = $gross - $mfuko - $value - $heslb - $staff;
			$data['result'] =  $result;
			break; 
		}
		echo json_encode($data);
	}
}
