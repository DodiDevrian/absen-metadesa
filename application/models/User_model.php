<?php

    class User_model extends CI_Model {

            public function create($data)
            {
                $this->db->insert('karyawan', $data);
            }

            public function login($email, $password){

                $query = $this->db->select('*')
                                  ->where('email', $email)
                                  ->get('karyawan');
                $row = $query->row();
                
                if ($row!=NULL) {
                    if($this->password->verify($password, $row->password)){
                            return $row;
                    }

                }else{
                        return false;
                }
            }
    }