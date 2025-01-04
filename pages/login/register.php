<?php

require '../../includes/init.php';

// session_start();
// if(isset($_SESSION["user"])){
//     header("location:../../");
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= urlOf('assets/fonts/material-icon/css/material-design-iconic-font.min.css')?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= urlOf('assets/css/signupstyle.css') ?>">
</head>

<body>

    <div class="main">



        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">

                        <!-- code for the register -->

                        <?php


//  print_r($_POST);
//   for check the all the data are gone or note....

if(isset($_POST["register"])){
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email'];
$address=$_POST['address'];
$username=$_POST['username'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];

$errors = array();//ARRAY declaration...

if(empty($name) OR empty($mobileno) OR empty($email) OR empty($address) OR empty($username) OR empty($password) ){
array_push($errors,"All Fields are required....");
}

// if(filter_var($email,FILTER_VALIDATE_EMAIL)){
//     array_push($errors,"Email is Not Valid...!!");
// }

if(strlen($password) < 4){
   array_push($errors,"Password Must be at least 4 character...");
}

if($password !== $confirmpassword){
   array_push($errors,"Password does not match....!!!");
}

if(count($errors) > 0){

        foreach($errors as $error){

            echo "<script type ='text/JavaScript'>"; 
            echo "alert('$error')"; 
            echo "</script>"; 

            }

}else{

   $query="INSERT INTO register(name,mobileno,email,address,username,password) VALUES('$name','$mobileno','$email','$address','$username','$password')";
           $result= mysqli_query($conn,$query);
           
           if($result){
            
               header("location:../../pages/login/login");
           }else{
               die(mysqli_error($conn));
           }
}

}

?>


                        <h2 class="form-title">Register</h2>
                        <form action="register" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="mobileno"><i class="zmdi zmdi-account material-icons-mobile"></i></label>
                                <input type="text" name="mobileno" placeholder="Your MobileNo" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-account material-icons-home"></i></label>
                                <input type="text" name="address" placeholder="Your Address" />
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Your UserName" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirmpassword" id="confirmpassword"
                                    placeholder="confirm password" />
                            </div>
                            <P id="message"></P>
                            <div class="alert alert-primary" role="alert">
                                A simple primary alert—check it out!
                            </div>
                            <div class="form-button">
                                <!-- <input type="submit" onclick="checkPassword()" class="form-submit" value="submit"/> -->
                                <input type="submit" name="register" class="form-submit" value="submit" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?= urlOf('assets/img/signup-image.jpg') ?>" alt="sing up image"></figure>
                        <a href="<?= urlOf('pages/login/login') ?>" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>


    </div>


    <!-- <script src="<?= urlOf('assets/js/script.js') ?>"></script>  -->

    <!-- JS -->
</body>

</html>