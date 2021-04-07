<?php 
class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->load->model('user_model');
    }

    public function sign_up_page(){
      $this->load->view('signup_view');  
    }

    public function signup(){
      $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
      $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
      $this->form_validation->set_rules('conpassword','Confirm Password','trim|required|matches[password]');
      if($this->form_validation->run()==FALSE){
          $data = array(
              'errors' => validation_errors()
          );
          $this->session->set_userdata($data);
          $this->load->view('signup_view');
      }
      else{
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $signup_status = $this->user_model->sign_up($username,$password);
          if($signup_status){
            $this->session->set_userdata('status','Your account has been created!');
            redirect('users');
          }
          else{
            $this->session->set_userdata('status_fail','Username has been used!');
            $this->load->view('signup_view');
          }
      }
    }

    public function login(){
      $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
      $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
      $this->form_validation->set_rules('conpassword','Confirm Password','trim|required|matches[password]');
      if($this->form_validation->run()==FALSE){
          $data = array(
              'errors' => validation_errors()
          );
          $this->session->set_userdata($data);
          redirect('users');
      }
      else{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login_status = $this->user_model->log_in($username,$password);
      }
      if($login_status){
        //$this->session->set_userdata('page','home');
        $this->session->set_userdata('login','true');
        //$this->load->view('main_view');
        //$data['body_view'] = 'main_view';
        redirect('users');
      }
      else{
        $this->session->set_userdata('errors','Sorry, username or password incorrect!');
        redirect('users');
      }
    }
    public function logout(){
      //$this->session->unset_userdata('login');
      $this->session->sess_destroy();
      redirect('users');
    }

    public function home(){
      $this->session->unset_userdata('page');
      redirect('users');
    }
    public function index(){
        $this->load->view('main');
    }
}
?>