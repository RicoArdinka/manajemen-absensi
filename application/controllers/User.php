<?php

class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Password'); // dari libraries password 
        $this->load->model('User_model');
    }

    public function register(){
        if($this->session->userdata('logged_in')){ //utk proteksi user yg sudah login
            redirect('dashboard');
        }

        $data['title'] = "Daftar";

        $this->load->view('template/home/header', $data);
		$this->load->view('pages/register', $data);
    }

    public function prosesRegister(){
        if($this->session->userdata('logged_in')){ //utk proteksi user yg sudah login
            redirect('dashboard');
        }

        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[karyawan.email]');
        $this->form_validation->set_rules('dob', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');

        if($this->form_validation->run() == false){
            $this->register(); //jika salah maka kembali ke register form
        }else{
            //nanti simpan ke database jika sukses/ true
            $dataRegister = ['nama_depan'       =>$this->input->post('nama_depan'),
                             'nama_belakang'    =>$this->input->post('nama_belakang'),
                             'email'            =>$this->input->post('email'),
                             'dob'              =>$this->input->post('dob'),
                             'alamat'           =>$this->input->post('alamat'),
                             'nomor_telepon'    =>$this->input->post('nomor_telepon'),
                             'nomor_hp'         =>$this->input->post('nomor_hp'),
                             'jenis_kelamin'    =>$this->input->post('jenis_kelamin'),
                             'password'         =>$this->password->hash($this->input->post('password')),
                             'id_departemen'    =>1,
                             'id_posisi'        =>1,
                             'dibuat'           =>date('Y-m-d H:i:s'),
                             'diganti'          =>date('Y-m-d H:i:s'),
                             'status'           =>'inteview'];
                             
            $this->User_model->create($dataRegister); //user dibuat masuk ke database
            
            //akan berhasil jika sukses register
            $dataPesan = ['pesan' => 'Selamat! akun berhasil dibuat',
                          'alert' => 'alert-success'];
            $this->session->set_flashdata($dataPesan); //hanya sekali dipanggil then dihancurkan

            redirect('login'); //mengarahkan ke user login
        }

    }

    public function login(){
        if($this->session->userdata('logged_in')){ //utk proteksi user yg sudah login
            redirect('dashboard');
        }

        $data['title'] = "Login";

        $this->load->view('template/home/header', $data);
		$this->load->view('pages/login', $data);
    }

    public function prosesLogin(){
        if($this->session->userdata('logged_in')){ //utk proteksi user yg sudah login
            redirect('dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if($this->form_validation->run() == false){
            $this->login(); //diarahkan kembali ke form login
        } else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->login($email);

            // $passwordHash = $user->password ?? false; // jika $user->password null maka return false
            if(!empty($user->password) && $this->password->verify($password, $user->password)){
               $dataLogin = ['logged_in'        => TRUE,
                             'user_id'          => $user->id,
                             'nama_depan'       => $user->nama_depan,
                             'nama_belakang'    => $user->nama_belakang];
               $this->session->set_userdata($dataLogin); //akan dihancurkan ketika close browser/ logout
               
               redirect('dashboard'); //mengarah ke halaman dashboard
            
            }else{
                $dataPesan = ['pesan' => 'Akun tidak terdaftar!, gagal login',
                              'alert' => 'alert-danger'];
                $this->session->set_flashdata($dataPesan); //hanya sekali dipanggil then dihancurkan
                $this->login();
            }
        }
    }

    public function logout(){
        $dataLogin = ['logged_in', 'user_id', 'nama_depan', 'nama_belakang'];

        $this->session->unset_userdata($dataLogin); //menghancurkan session userdata yg aktif

        redirect('login');
    }
}