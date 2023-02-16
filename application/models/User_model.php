<?php

    class User_model extends CI_Model{
        public function create($data){
            $this->db->insert('karyawan', $data); //untuk menginsert database dari input yg telah disubmit
        }

        public function login($email){
            $query = $this->db->select('*')
                              ->where('email', $email)
                              ->get('karyawan');

            $row = $query->row(); //pengembalian data hanya 1 yg tampil
            return $row;
        }
    }