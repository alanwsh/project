<?php 
    class user_model extends CI_Model{
     
        public function log_in($username,$password){
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $result = $this->db->get('users');
            if($result->num_rows()==1){
                $this->session->set_userdata('log_id',$result->row(0)->id);
                $this->session->set_userdata('username',$result->row(0)->username);
                $this->session->set_userdata('password',$result->row(0)->password);
                $this->session->set_userdata('usertype',$result->row(0)->type);
                return true;
            }
            else
                //$this->session->set_userdata('errors','Sorry, username or password incorrect!');
                return false;
        }

        public function sign_up($username,$password){
            $this->db->where('username',$username);
            $result = $this->db->get('users');
            if($result->num_rows()>0){
                $this->session->set_userdata('signup_fail','This username has been used!');
                return false;
            }
            else{
                $data = array(
                    'username' => $username,
                    'password' => $password
                );
                $this->db->insert('users',$data);
                return true;
            }
        }
    }
?>