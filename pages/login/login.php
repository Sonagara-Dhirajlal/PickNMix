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


        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?= urlOf('assets/img/signin-image.jpg') ?>" alt="sing up image"></figure>
                        <a href="<?= urlOf('pages/login/register') ?>" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">

                        <!-- code for the login form -->

                        <?php



if(isset($_POST["login"])){
    
    
    // print_r($_POST);
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $query="SELECT id,username,password FROM register WHERE username='$username' AND password='$password'";

    $result=mysqli_query($conn,$query);
    $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
    // print_r($user);
    
    if($user){
            session_start();
            $_SESSION["user"] = "yes";
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userName'] = $user['username'];
            header("location:../../");
    }else{
        echo "<script>";
        echo "alert('username and password dose not match')";
        echo "</script>";
    }
}

?>

                        <h2 class="form-title">Sign in</h2>

                        <?php
                            // print_r($_SESSION); 
                            // check session is work or not
                        ?>


                        <form action="login" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Enter UserName" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Enter Password" />
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="login" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>