<?php 
require_once("connect.php");
session_start();
if(isset($_POST["registation"])){
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$conformpwd = $_REQUEST["conformpwd"];

$photo = explode('.', $_FILES["photo"]["name"]);
$photo = end($photo);
$photo_name = $username.".".$photo;
$tmp_name = $_FILES["photo"]["tmp_name"];
}
$error = array();

if(empty($name)){
    $error["name"]="Name feid is requird";
}
if(empty($email)){
    $error["email"]="email feid is requird";
}
if(empty($username)){
    $error["username"]="username feid is requird";
}
if(empty($password)){
    $error["password"]="password feid is requird";
}
if(empty($conformpwd)){
    $error["conformpwd"]="conformpassword feid is requird";
}

if(count($error)==0){
    $select = "SELECT * FROM users WHERE email='$email' ";
    $email_check = mysqli_query($connect,$select);
    if(mysqli_num_rows($email_check)==0){
        $sl_username = "SELECT * FROM users WHERE username='$username' ";
        $username_check = mysqli_query($connect,$sl_username);
        if(mysqli_num_rows($username_check)==0){
            if(strlen($password)>6){
                if($password==$conformpwd){
                    $password = md5($password);
                    $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUE('$name','$email','$username','$password','$photo_name','inactive')";
                    $insert_query = mysqli_query($connect,$query);
                    if($insert_query){
                        header("location: registation.php?success=$username");
                        move_uploaded_file($tmp_name,"../img/$photo_name");
                        
                        $_SESSION["data_insert_succes"]="Data Insert Succes";
                    }else{
                        $_SESSION["data_insert_error"]="Data Insert Error!";
                    }
                }else{
                    $check_pwd = "password not macth!";
                }
            }else{
                $error_pwd = "Password more then 8 chartar";
            }
        }else{
            $username_error = "This username is exist!";
        }
    }else{
        $email_error = "This email is exist!";
    }
}



?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registation/Student Management System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <!--=== Reset Css ===-->
        <link rel="stylesheet" href="../css/normalize.css">
        <!--=== Animate ===-->
        <link rel="stylesheet" href="../css/plugin/animate.css">
        <!--=== Hover Animation ===-->
        <link rel="stylesheet" href="../css/plugin/hover-min.css">
        <!--=== Bootstrap ===-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!--=== Fontawesome icon ===-->
        <link rel="stylesheet" href="../css/font-awesome.all.min.css">
        <!--=== Owl carousel ===-->
        <link rel="stylesheet" href="../css/plugin/owl.carousel.min.css">
        <!--=== Magnific PopUp ===-->
        <link rel="stylesheet" href="../css/plugin/magnific-popup.css">
        <style>
            p{
                padding-right:20px;
                font-size:16px;
            }
        </style>
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--===============================================================================-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <h1 class="text-center my-2">Admin Registation Form</h1>
                </div>
            </div>
            <hr>
            <div class="row"> 
                <div class="col-md-6 mx-auto">

<?php if(isset($_REQUEST["success"])){echo "<div class='alert alert-success'>Data Insert Succes</div>";unset($_REQUEST["success"]);} ?>
<?php if(isset($_SESSION["data_insert_error"])){echo "<div class='alert alert-warning'>".$_SESSION['data_insert_error']."</div>" ;} ?>
<?php if(isset($email_error)){echo "<div class='alert alert-warning'>"; echo "<p>"; echo $email_error; echo "</p>"; echo "</div>"; } ?>
<?php if(isset($username_error)){ echo "<div class='alert alert-warning'>"; echo "<p>"; echo $username_error; echo "</p>"; echo "</div>"; } ?>
<?php if(isset($error_pwd)){ echo "<div class='alert alert-warning'>"; echo "<p>"; echo $error_pwd; echo "</p>"; echo "</div>"; } ?>
<?php if(isset($check_pwd)){ echo "<div class='alert alert-warning'>"; echo "<p>"; echo $check_pwd; echo "</p>"; echo "</div>"; } ?>


                    <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                        <div class="form-group row"> 
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" placeholder="Enter you name" value="<?php if(isset($name)){ echo $name;} ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" id="email" name="email" placeholder="Enter You Email" value="<?php if(isset($email)){ echo $email;} ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="username" id="username" name="username" placeholder="Enter You Username" value="<?php if(isset($username)){ echo $username;} ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="password" name="password" placeholder="Enter You Password" value="<?php if(isset($password)){ echo $password;} ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label for="conformpwd" class="col-sm-2 col-form-label">Conform Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="conformpwd" name="conformpwd" placeholder="Enter You Conform Password" value="<?php if(isset($conformpwd)){ echo $conformpwd;} ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" id="photo" name="photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-right">
                                <input type="submit" name="registation" value="Registation" class="btn btn-info">
                            </div>
                        </div>
                        
                    </form>
                    <hr>
                    <p class="mb-3">You have an already account then place <a href="login.php">Login</a>?</p>
                </div>
            </div>
            <hr>
            <footer class="text-center py-1"> 
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
        <script defer type="text/javascript" src="js/main.js"></script>

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
