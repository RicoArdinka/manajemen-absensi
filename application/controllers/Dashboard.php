<?php

class Dashboard extends CI_Controller {

	public function __construct() //digunakan untuk mengload pertama kali 
	{
		parent:: __construct();
		// $this->load->helper('url'); 
	}
    
	public function index()
	{

		print_r($this->session->userdata());
		// $this->load->database(); sudah diwakilkan oleh autoload.php
		// $this->load->model('Karyawan_model');
		$data['title'] = "Dashboard";

		$this->load->view('template/home/header', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('template/home/footer', $data);

	}
}
