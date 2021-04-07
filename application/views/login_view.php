<head>
<link rel = "stylesheet" href = "<?php echo base_url();?>assets/css/bootstrap.min.css">
        <script src = "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src = "<?php echo base_url();?>assets/js/jquery.js"></script>
    <title>Log In Page</title>
</head>

<style>


.login-error{
    background-color:red;
    color:white;
    width:50%;
    text-align:left;
    padding:10px;
    border-radius:20px;
    margin-bottom:20px;
}

.success-notify{
    background-color:#00e699;
    color:white;
    width:50%;
    text-align:left;
    padding:10px;
    border-radius:20px;
    margin-bottom:20px;
}

.login-form{
    width:50%;
    background-color:white;
    border-radius:20px;
    padding:10px;
    opacity:90%;
    display:flex;
    flex-direction:column;
}

.login-form btn{
    justify-content:center;
}

h2{
    font-family: 'Staatliches', cursive;
    text-align:center;
}


.log-btn{
    margin-left:5px;
    margin-right:5px;
    font-family:'Comic Sans Ms';
    background-color:#1569C7;
    border:none;
    border-radius:5px;
    color:white; 
    padding-left:10px;
    padding-right:10px;
    padding-top:5px;
    padding-bottom:5px;
    text-align:center;
    font-size:12px;   
}

.center-btn{
    align-self:center;
    display:flex;
}
</style>



    <?php
    if($this->session->userdata('errors')){
        echo "<div class = 'login-error'>";
        echo $this->session->userdata('errors');
        $this->session->unset_userdata('errors');
        echo "</div>";
    }
    if($this->session->userdata('status')){
        echo "<div class = 'success-notify'>";
        echo $this->session->userdata('status');
        $this->session->unset_userdata('status');
        echo "</div>";
    }
    if($this->session->userdata('signup_errors')){
        //redirect('users/signup_view');
    }
        
    ?>
<div class = "login-form">
<h2>Log In Page</h2>
<div class = "form-group">
<?php
 $attributes = array(
        'id' => 'login_form',
        'class' => 'form-horizontal',
        'method' => 'post',
        'role' => 'form'
    );
     echo form_open('users/login',$attributes);    
?>
</div>
<div class = "form-group">
    <?php 
    
        echo form_label('Username');
        $data = array(
            'class' => 'form-control',
            'name' => 'username',
            'placeholder' => 'Enter Username'
        );
        echo form_input($data);
    ?>
</div>
<div class = "form-group">
    <?php
    echo form_label('Password');
    $data = array(
        'class' => 'form-control',
        'name' => 'password',
        'placeholder' => 'Enter Password'
    );
    echo form_password($data);
    ?>
</div>
<div class = "form-group">
    <?php 
    echo form_label('Confirm Password');
    $data = array(
        'class' => 'form-control',
        'name' => 'conpassword',
        'placeholder' => 'Confirm Password'
    );
    echo form_password($data);
    ?></div>
<?php
$data = array(
    'class' => 'log-btn',
    'id' => 'log-btn',
    'name' => 'submit',
    'value' => 'Log In'
);
?>
<div class = "center-btn">
<div class = "form-group">
<?php
echo form_submit($data);
echo form_close();
?>
</div>
<div class = "form-group">
<?php
echo form_open('use
rs/sign_up_page');
$data = array(
    'class' => 'log-btn',
    'id' => 'signup-btn',
    'name' => 'submit',
    'value' => 'Sign Up'
);
echo form_submit($data);
echo form_close();

?>
</div>
</div>

</div>