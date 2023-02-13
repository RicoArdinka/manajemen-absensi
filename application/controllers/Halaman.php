<?php

class Halaman extends CI_Controller {

	public function __construct() //digunakan untuk mengload pertama kali 
	{
		parent:: __construct();
	}
    
	public function tampil()
	{
		// $this->load->database(); sudah diwakilkan oleh autoload.php
		// $this->load->model('Karyawan_model');

		$data['dataKaryawan'] = $this->Karyawan_model->semua()->row();

		$this->load->view('tampilanSaya', $data);
	}
}
