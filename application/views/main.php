
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alan's Western Restaurant</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src = "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src = "<?php echo base_url();?>assets/js/jquery.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
</head>
<style>
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
    .input-details{
        display:flex;
        flex-direction:column;
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
body{
    width:100vw;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:0;
    flex-direction:column;
}
.login{
    background-image:linear-gradient(to right,#00FFFF,#ADD8E6);
    display:flex;
    flex-direction:column;
    width:100vw;
    min-height:100vh;
    justify-content:center;
    align-items:center;
}

.home{
    width:100vw;
    height:100vh;
}

.nav{
    margin-top:60px;
    width:100vw;
    height:50px;    
    display:flex;
    align-items:center;
    justify-content:space-between;
}
.nav img{
    height:130px;
    padding-bottom:5px;
} 
ul{
    box-sizing:border-box;
    list-style-type:none;
    background-color:white;
    display:flex;
    align-items:center;
    

    /* //background-image:linear-gradient(to right,#00FFFF,#ADD8E6);  */
}
a:hover{
    color:#blue; 
}
li{
    text-decoration:none;
}

a{
    font-family: 'Staatliches', cursive;
    font-size:28px;
    font-weight:bold;
    letter-spacing:1px;
    text-align:center;
    margin:15px;
    text-decoration:none;
    color:black;
    position:relative;
}
a:hover{
    color: red;
}
a::after{
  background-color: red;
  content: "";
  width: 0;
  height: 3px;
  left: 0;
  bottom: 0;
  transition: width 0.35s ease 0s;
  position: absolute;
}
a:hover::after{
    width: 100%;
}
.footer{

}
</style>
<body>

<?php
if($this->session->userdata('login')==null){
    echo "<div class = 'login'>";
    $this->load->view('login_view');
    echo "</div>";
}
else{
    echo "<div class = 'nav'>";
    echo "<img src='image/logo.png'>";
    echo "<ul>";
        if($this->session->userdata('usertype')=='admin')
        echo "<li><a href = 'product/add_product'>Add Product</a></li>";
        echo "<li><a href = 'users/home'>Home</a></li>";
        if($this->session->userdata('page')==null)
        echo "<li><a href = '#product'>Products</a></li>";
        echo "<li><a href = 'users/logout'>Logout</a></li>";
    echo "</ul>";
    echo "</div>";
    if($this->session->userdata('page')==null){
         echo "<div class = 'home'>";
          $this->load->view('main_view');
      } 
     elseif($this->session->userdata('page')=='product'){
        echo "<div class = 'home'>";
         $this->load->view('product_view');
         //$this->session->unset_userdata('page');
     }
     elseif($this->session->userdata('page')=='add'){
         echo "<div class = 'home'>";
         $this->load->view('insert_product_view');
         //$this->session->unset_userdata('page');
     }  
     echo "<div class = 'footer'>";
     $this->load->view('footer');
     echo "</div>";
     echo "</div>";
    }

?>
</body>
</html>

