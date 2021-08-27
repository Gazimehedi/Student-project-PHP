<?php 
require_once("connect.php");
session_start();
if(isset($_SESSION["user_login"])){
    header("location: index.php");
}
if(isset($_POST["login"])){
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$select = "SELECT * FROM users WHERE username='$username' ";
$username_check = mysqli_query($connect,$select);

if(mysqli_num_rows($username_check)==1){
    $row = mysqli_fetch_array($username_check);
    if($row["password"]==md5($password)){
        if($row["status"]=="active"){
            $_SESSION["user_login"]=$username;
            header("location: index.php");
        }else{
            $acount_inactive = "Please active your account then login!";

        }
    }else{
        $password_error = "Password wrong!";
    }
   
    
}else{
    $login_error = "This Username Not Found!";
}

}


?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login/Student Management System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!--=== Reset Css ===-->
        <link rel="stylesheet" href="../css/normalize.css">
        <!--=== Animate ===-->
        <link rel="stylesheet" href="../css/plugin/animate.css">
        <!--=== Hover Animation ===-->
        <link rel="stylesheet" href="css/plugin/hover-min.css">
        <!--=== Bootstrap ===-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!--=== Fontawesome icon ===-->
        <link rel="stylesheet" href="../css/font-awesome.all.min.css">
        <!--=== Owl carousel ===-->
        <link rel="stylesheet" href="../css/plugin/owl.carousel.min.css">
        <!--=== Magnific PopUp ===-->
        <link rel="stylesheet" href="../css/plugin/magnific-popup.css">
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--===============================================================================-->
        <div class="container animated shake">
            <div class="row">
                <div class="col-sm-12">
                <h1 class="text-center my-3">Welcome to Students Management System</h1>
                </div>
                
            </div>
            <hr>
            <div class="row mb-5 pb-5"> 
                <div class="col-sm-4 offset-sm-4">
                 <?php if(isset($login_error)){echo "<div class='alert alert-danger'>".$login_error."</div>";}?>
                 <?php if(isset($password_error)){echo "<div class='alert alert-danger'>".$password_error."</div>";}?>
                 <?php if(isset($acount_inactive)){echo "<div class='alert alert-danger'>".$acount_inactive."</div>";}?>
                    <form action="" method="post"> 
                        <h2 class="text-center">Admin Login Form</h2>
                        <input type="text" name="username" placeholder="Username" value="<?php if(isset($username)){echo $username; }?>" class="form-control my-3" required>
                        <input type="password" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password; }?>" class="form-control my-3" required>
                        <div class="text-right">
                            <input type="submit" name="login" value="Login" class="btn btn-info">
                        </div>
                    </form>
                    <hr>
                    <p class="text-right mb-5 pb-5">You have no account then place <a href="registation.php">Register</a></p>
                    
                </div>
            </div>
            <hr>
            <footer class="text-center py-2"> 
                <p>Copyright &copy; 2018-<?php echo date('Y');?> All Right Reserved</p>
            </footer>
        </div>
        <!--==================================================================-->
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <!--=== All Plugin ===-->
        <script defer type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
        <script defer type="text/javascript" src="../js/plugin/wow.min.js"></script>
        <script defer type="text/javascript" src="../js/plugin/owl.carousel.min.js"></script>
        <script defer type="text/javascript" src="../js/plugin/jquery.magnific-popup.min.js"></script>
        <script defer type="text/javascript" src="../js/font-awesome.all.min.js"></script>

        <!--=== All Active ===-->
        <script defer type="text/javascript" src="../js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>