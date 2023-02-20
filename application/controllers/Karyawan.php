<?php

class Karyawan extends CI_Controller {

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
		$data['title'] = "Karyawan - xxxx";

		$this->load->view('template/dashboard/body', $data);
	}

    public function read()
    {
        $data['title'] = "Karyawan - read";
    
        $this->load->view('template/dashboard/body', $data);
    }
}
