<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,500&display=swap" rel="stylesheet"> 
<script src = "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src = "<?php echo base_url();?>assets/js/jquery.js"></script>
<style>
html{
    scroll-behavior:smooth;
}
div::-webkit-scrollbar{
    width:15px;
    height:15px;
}

div::-webkit-scrollbar-track{
    box-shadow:inset 0 0 5px grey;
    border-radius:5px;
}

div::-webkit-scrollbar-thumb{
    background:black;
    border-radius:5px;
}

.product img{
    width:200px;
    height:200px;
    border-radius:20px;
}

.advertisement{
    font-family: 'Staatliches', cursive;
    letter-spacing:1px;
    background-image:url('image/adver.jpg');
    max-width:100vw;
    height:auto;
    width:100vw;
    min-height:60%;
    background-size:cover;
    display:flex;
    flex-direction:column;
    background-repeat:no-repeat;
    justify-content:center;
}

.advertisement highlight{
    color:#862D2D;
    font-weight:bold;
    font-size:33px;
}
.advertisement h1{
    color:black;
    padding-left:35vw;
}

.advertisement p{
    color:black;
    padding-left:35vw;
    padding-right:5%;
    line-height:1.6;
    font-family: 'Ubuntu', sans-serif;
}

.product h2{
    text-align:center;
}

.product-btn{
    width:100px;
    margin-top:5px;
    font-family:'Comic Sans Ms';
    background-color:red;
    border:none;
    border-radius:5px;
    color:white; 
    padding:5px;
    text-align:center;
    font-size:12px;
    cursor:pointer;
}

.product_home{
    position:relative;
    width:100%;
    display:flex;
    flex-direction:row;
    align-items:center;
    overflow-x: scroll;
    overflow-y: hidden;
    padding-bottom:30px;
}

.product_list{
    display:flex;
    flex-direction:column;
    text-align:center;
    align-items:center;
    padding-left:100px;
    padding-right:100px;
}

.product_home h3{
    font-family:'Comic Sans Ms';
    font-size:15px;
    height:30px;
}

.footer{
    padding-left:10px;
    margin-top:-30px;
    background-color:red;
    color:white;
    font-family:'Comic Sans Ms';
    font-size:20px;
}
.footer h4{
    padding-top:30px;
}

.footer h5{
    margin-bottom:5px;
}
.footer img{
    width:30px;
    height:30px;
}
.footer .socialm{
    display:flex;
    font-size:12px;
    font-weight:bold;
    align-items:center;
}
.socialm span:hover{
    color:#4dffc3;
    letter-spacing:1px;
    text-transform:uppercase;
    font-size:13px;
    cursor:pointer;
}
@media only screen and (max-width:650px){
    .advertisement h1{
        padding:5% 0 0 40vw;
        font-size:25px;
    }
    .advertisement p{
        padding-left:40vw;
        font-size:15px;
    }
    .product_home{
        flex-direction:column;
    }
    .product_list img{
        width:150px;
        height:150px;
    }

    a{
        font-size:20px;
    }

}
@media only screen and (max-width:570px){
    .advertisement h1{
        padding:5% 0 0 48vw;
    }
    .advertisement p{
        padding-left:48vw;
    }
    
    a{
        font-size:15px;
    }

}
</style>

    <div class = "advertisement">
        <h1>THREE DOTS</h1>
        <p><highlight>THREE DOTS</highlight> is a local business locating in Malaysia. We sell handmade cookies which in different types of flavours. We deliver delicious cookies and also elegant packaging to make customers satisfied with it appearance and tastes!</p>
    </div>
    <div class = "product" id = "product">
        <h2>Our Products</h2>
        <div class = "product_home">
        <?php
        $query = $this->db->query("SELECT * FROM product");
        foreach($query->result_array() as $row){
         $link = "product/product_details/".$row['product_id'];
            // $link = "product/product_details/".$row['product_id'];
            //echo $link;
            echo "<div class = 'product_list'>";
                echo "<h3>".$row['product_name']."</h3>";
                    echo "<img src = 'image/product/".$row['product_image']."'>";
                $data = array(
                    'class' => 'product-btn',
                    'id' => $row['product_id'],
                    'name' => 'submit',
                    'value' => 'Check More'
                );
                $attributes = array(
                    'id' => $row['product_id'],
                    'method' => 'post',
                    'role' => 'form'
                );
                echo '<form action="http://localhost/project/product/product_details/'.$row['product_id'].'" id="1" method="post" role="form" accept-charset="utf-8">
                <input type="submit" name="submit" value="Check More" class="product-btn" id="'.$row['product_id'].'">
                    </form>';
                //echo form_open($link,$attributes);
                //echo '<input type = "hidden" name = "p_id" value = '.$row['product_id'].'>';
                //echo form_submit($data);
                //form_close();
            echo "</div>";
        }

        //$CI =& get_instance();
        //$CI->call_product();
        //if($this->session->userdata('product'))
        //echo $this->session0>userdata('product');
        ?>
        </div>
    </div>
    