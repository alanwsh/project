<head>
<link rel = "stylesheet" href = "<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
        <script src = "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src = "<?php echo base_url();?>assets/js/jquery.js"></script>
    <title>Sign Up Page</title>
</head>

<style>
body{
    background-image:linear-gradient(to right,#00FFFF,#ADD8E6);
    display:flex;
    flex-direction:column;
    height:100%;
    justify-content:center;
    align-items:center;
}

.login-error{
    background-color:red;
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

<body>

    <?php
    if($this->session->userdata('signup_fail')){
        echo "<div class = 'login-error'>";
        echo $this->session->userdata('signup_fail');
        $this->session->unset_userdata('signup_fail');
        echo "</div>";
    }
    if($this->session->userdata('errors')){
        echo "<div class = 'login-error'>";
        echo $this->session->userdata('errors');
        $this->session->unset_userdata('errors');
        echo "</div>";
    }
        
    ?>
<div class = "login-form">
<h2>Sign Up Page</h2>
<div class = "form-group">
<?php
 $attributes = array(
        'id' => 'login_form',
        'class' => 'form-horizontal',
        'method' => 'post',
        'role' => 'form'
    );
     echo form_open('users/signup',$attributes);    
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
    'value' => 'Sign Up'
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
echo form_open('users/index');
$data = array(
    'class' => 'log-btn',
    'id' => 'log-btn',
    'name' => 'submit',
    'value' => 'Back'
);
echo form_submit($data);
echo form_close();
?>
</div>
</div>

</div>
</body>
