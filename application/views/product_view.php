<style>
.container{
    padding:5vw; 
}

.container form > input{
    margin:10px;
    background-color:red;
    color:white;
    font-size:15px;
    padding:10px;
    border:none;
    border-radius:10px;
}

.container form > input:hover{
    text-transform:uppercase;
    padding:13px;
    transition: 0.5s ease 0s;
    font-weight:bold;
}

.box{
    background-image:linear-gradient(to right,#ff8080,#ADD8E6);
    display:flex;
    align-items:center;
    border-radius:10px;
    padding:5vw;
}
#p_img{
    width:300px;
    height:300px;
    border-radius:10px;
}



</style>    
<div class = "container">
<form action = "product/edit_product/<?php echo $this->session->userdata('product_id');?>" method = "post">
<input type ="submit" value = "Edit Details" >
</form>
    <div class = "box">
    
    <div class = "col-1">
        <h1><?php echo $this->session->userdata('product_name');?></h1>
        <?php
            echo "<img id = 'p_img' src = 'image/product/".$this->session->userdata('product_image')."'></img>";
        ?>
    </div>
    <div class = "col-2">
        <h2>Weight:</h2>
        <?php
            echo "<h3>".$this->session->userdata('product_details')."</h3>";
        ?>
        <h2>Price:</h2>
        <?php
            $p_price = $this->session->userdata('product_price');
            $index = strpos($p_price,'.')+1;
            if(strlen($p_price)-$index < 2)
            echo "<h3>RM".$this->session->userdata('product_price')."0</h3>";
            else
            echo "<h3>RM".$this->session->userdata('product_price')."</h3>";
        ?>
    </div>
    </div>
</div>