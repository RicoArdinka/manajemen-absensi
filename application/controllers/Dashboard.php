<?php

class Dashboard extends CI_Controller {

	public function __construct() //digunakan untuk mengload pertama kali 
	{
		parent:: __construct();
		// $this->load->helper('url'); 
		// $this->load->helpers(['menuAktif']);
	}
    
	public function index()
	{
		// $this->load->database(); sudah diwakilkan oleh autoload.php
		// $this->load->model('Karyawan_model');
		$data['title'] = "Dashboard";

		$this->load->view('template/dashboard/body', $data);
	}
}
