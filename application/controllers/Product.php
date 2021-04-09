<?php 
class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('product_model');
        $this->load->helper('file');
    }

    public function product_details($id){
        //echo $id;
        $this->product_model->load_product($id);
        $this->session->set_userdata('page','product');
        //$this->load->view('product_view');
        redirect('users');
        //$this->db->where('id',$id);
    }

    public function add_product(){
        $this->session->set_userdata('page','add');
        redirect('users');
    }

    public function edit_product($id){
        $this->session->set_userdata('page','edit');
        redirect('users');
        //$this->load->view('edit_view');
    }
    public function insert_product(){
        //$this->session->unset_userdata('temp_img_path');
        $config['upload_path'] = './image/product';
        $config['allowed_types'] = 'jpg';
        
        $this->load->library('upload',$config);

        $this->form_validation->set_rules('product_name','Product Name','required');
        $this->form_validation->set_rules('product_price','Product Name','required');
        $this->form_validation->set_rules('product_details','Product Details','required');
        if(!$this->upload->do_upload('product_image')){
            $errors = $this->upload->display_errors();
        }
        else{ 
            $errors = '';
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
        }
        if($this->form_validation->run()==FALSE){
            unlink('image/product/'.$filename);
            $config['upload_path'] = './image/temp';
            $config['allowed_types'] = 'jpg';
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $this->upload->do_upload('product_image');
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $temp_img_path = 'image/temp/'.$this->session->userdata('temp_img_path');
            echo $temp_img_path;
            unlink($temp_img_path);
            $this->session->set_userdata('temp_img_path',$filename);
            $errors.= validation_errors();
            $data = array(
                'errors' => validation_errors()
            );
              
            //echo $data;
            $this->session->set_userdata('errors',$errors);
            $this->session->set_userdata('page','add');   
        }
        else{
            $product_name = $this->input->post('product_name');
            $product_details = $this->input->post('product_details');
            $product_price = $this->input->post('product_price');
            $data = array(
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_details' => $product_details,
                'product_image' => $filename
            );
            $this->product_model->add_product($data);
        }
        redirect('users');

    }

    public function update_product(){
        echo $this->session->userdata('product_id');
    }
}