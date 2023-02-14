<?php

class Halaman extends CI_Controller {

	public function __construct() //digunakan untuk mengload pertama kali 
	{
		parent:: __construct();
		// $this->load->helper('url'); 
	}
    
	public function tampil()
	{
		// $this->load->database(); sudah diwakilkan oleh autoload.php
		// $this->load->model('Karyawan_model');
		$data['title'] = "ini title halaman";
		$data['dataKaryawan'] = $this->Karyawan_model->semua()->row(); //untuk mengambil data 

		$this->load->view('template/header', $data);
		$this->load->view('tampilanSaya', $data);
		$this->load->view('template/footer', $data);

	}
}
