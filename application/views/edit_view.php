<!-- <head>
<link rel = "stylesheet" href = "<?php //echo base_url();?>assets/css/bootstrap.min.css">
        <script src = "<?php //echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src = "<?php //echo base_url();?>assets/js/jquery.js"></script>
</head> -->
<script>
// function change_preview(){
//     const file_input = document.querySelector('input');
//     file_input.addEvenetListener('change',updateImageDisplay);
// }
</script>
<style>

.input-file > input{
    visibility:hidden;
    width:0;
    height:0;
}

.nav{
    transform:translateY(-30px);
}
.input-file img{
    width:150px;
    height:150px;
    border-radius:20px;
    border:2px solid brown;
}
.box{
    display:flex;
    flex-direction:column;
    /* background-image:linear-gradient(to right,#ff8080,#ADD8E6); */
    background-color:white;
    border-radius:20px; 
}


.container{ 
    display:flex;
    flex-direction:column;
    padding:2vw;
    font-family:'Comic Sans Ms';
    color:#800000;
    background-color:black;
    opacity:0.9;
}

.input-details{
    margin-left:30px;
    display:flex;
    flex-direction:column;
    flex-grow:2;  
}
.contain{
    display:flex;
    flex-direction:column;
}
.col-1{
    flex-grow:1;
}
.form-group{
    margin-left:20px;
    margin-right:20px;
}

.form-group > input{
    width:100%;
    border:2px solid #aaa;
    border-radius:10px;
    margin-top:5px;
    outline:none;
    padding:8px;
    box-sizing:border-box;
    transition:.3s;
}

.form-group > input:focus{
    border-color:#990000;
    box-shadow:0 0 8px 0 #990000;
}


.form-group > label{
    font-size:20px;
    font-weight:bold;
    color:#660000;
}
.btn-sub{
    background-color:red;
    font-family:'Comic Sans Ms';
    border-radius:5px;
    color:white;
    border:none;
    font-size:15px;
    padding:10px;
}
.row1{
    display:flex;
    padding:20px; 
    align-items:center; 
    justify-content:space-evenly;
    text-align:center;
}
.row2{
    display:flex;
    justify-content:center;
    padding-bottom:20px;
}

.errors{
    background-color:red;
    color:white;
    border-radius:20px;
    margin:10px;
}
</style>
<div class = "container">
        <div class = "box">
        <div class = "errors">
        <?php
            if($this->session->userdata('errors')):
                echo $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
            endif;
        ?>
        </div>
        <div class = "contain">
        <div class = "row1">
            <div class = "col-1">
            <?php //echo form_open('product/insert_product');?>
                <h1>Insert Product</h1>
                    <form method = "post" action = "<?=base_url('product/update_product')?>" enctype = "multipart/form-data" novalidate>
                    
                    <div class = "input-file">
                        <label for = "product_image">
                        <?php                   
                       echo "<img id = 'preview' src = 'image/product/".$this->session->userdata('product_image')."' ></img>";
                        ?>
                        <!-- <img src = 'image/upload_image.jpg' id = 'preview'> -->
                        </label>
                   <input type = "file" onchange = "document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" id = "product_image" name = "product_image" size = "33" required>
                    </div>
                
            </div>
            <div class = "input-details">
            
                <div class = "form-group">
                    <?php
                    echo form_label('Product Name');
                    $data = array(
                        'class' => 'form-control',
                        'name' => 'product_name',
                        'placeholder' => 'Enter Product Name',
                        'value' => $this->session->userdata('product_name')
                    );
                    echo form_input($data);
                    form_close();
                    ?>
                </div>

                <div class = "form-group">
                    <?php
                    echo form_label('Product Price');
                    $data = array(
                        'class' => 'form-control',
                        'name' => 'product_price',
                        'placeholder' => 'Enter Product Price (RM)',
                        'value' => $this->session->userdata('product_price')
                    );
                    echo form_input($data);
                    ?>
                </div>

                <div class = "form-group">
                    <?php
                    echo form_label('Product Details');
                    $data = array(
                        'class' => 'form-control',
                        'name' => 'product_details',
                        'placeholder' => 'Enter Product Details',
                        'value' => $this->session->userdata('product_details')
                    );
                    echo form_input($data);
                    ?>
                </div>    
            </div>
            </div>
            <div class = "row2">
            <?php
                $data = array(
                    'class' => 'btn-sub',
                    'name' => 'submit',
                    'value' => 'Update Item'
                );
                echo form_submit($data);
                form_close();
            ?>
            <!-- <input type = "submit" value = "Insert Item" class="btn-sub"> -->
            </div>
        </div>
        </div>
</div>
