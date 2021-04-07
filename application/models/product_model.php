<?php
class product_model extends CI_Model{
    public function load_product($id){
        $this->db->where('product_id',$id);
        $result = $this->db->get('product');
        if($result->num_rows()==1){
            $this->session->set_userdata('page','product_page');
            $this->session->set_userdata('product_name',$result->row(0)->product_name);
            $this->session->set_userdata('product_price',$result->row(0)->product_price);
            $this->session->set_userdata('product_details',$result->row(0)->product_details);
            $this->session->set_userdata('product_image',$result->row(0)->product_image);
            $this->session->set_userdata('product_id',$result->row(0)->product_id);
        }
    }

    public function add_product($data){
        $temp_img_path = 'image/temp/'.$this->session->userdata('temp_img_path');
         unlink($temp_img_path);
         $this->session->unset_userdata('temp_img_path');
        $this->db->insert('product',$data);
        $this->session->unset_userdata('page');
    }
}
?>