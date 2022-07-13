<?php

    class Karyawan_model extends CI_Model {

        public function semua(){
            $query = $this->db->select('*')
                              ->get('karyawan');
            return $query;
        }

        public function semuaKaryawanAktif(){
            $query = $this->db->select('*')
                              ->where('status', 'karyawan aktif')
                              ->get('karyawan');
            return $query;
        }        

        public function berdasarkanId($id){
            $query = $this->db->select('*')
                              ->where('id', $id)
                              ->get('karyawan');
            return $query;
        }

        public function profile($id){
            $query = $this->db->select('*')
                                ->join('departemen', 'departemen.id=karyawan.id_departemen')
                                ->join('posisi', 'posisi.id=karyawan.id_posisi')
                              ->where('karyawan.id', $id)
                              ->get('karyawan');
            return $query;
        }

        public function tunjangan($id){
            $query = $this->db->select('*')
                                ->join('tunjangan', 'tunjangan.id_karyawan=karyawan.id')
                              ->where('karyawan.id', $id)
                              ->get('karyawan');
            return $query;
        }

        public function kategori($id){
            $query = $this->db->select('*')
                                ->join('kategori', 'kategori.id=tunjangan.id_kategori')
                              ->where('tunjangan.id_karyawan', $id)
                              ->get('tunjangan');
            return $query;
        }

        public function berdasarkanEmail($email){
            $query = $this->db->select('*')
                              ->where('email', $email)
                              ->get('karyawan');
            return $query;
        }

        public function berdasarkanNama($nama){
            $query = $this->db->select('*')
                              ->like('CONCAT( nama_depan, " ", nama_belakang )', $nama, 'after')
                              ->get('karyawan');
            return $query;
        }

        public function create($data)
        {
            $this->db->insert('karyawan', $data);
        }

        public function update($id, $data){
            $query = $this->db->where('id', $id);
            $query = $this->db->update('karyawan', $data);
            
            return $query;
        }
<<<<<<< HEAD

        public function delete($where, $data)
        {
            $this->db->delete($data, $where);
        } 
=======
>>>>>>> 447a5360d5b5304e4f4417ddec40714f4299737a
    }