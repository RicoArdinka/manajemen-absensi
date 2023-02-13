<?php

    class Orang extends CI_Controller{
        public function nyasar(){

            $data['heading'] = "Ini adalah halaman 404";
            $data['message'] = "Kamu kesasar, kembali ke halaman utama";

            $this->load->view('errors/html/error_404', $data);
        }
    }