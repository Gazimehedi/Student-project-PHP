<?php 
require_once("connect.php");
session_start();
if(!isset($_SESSION["user_login"])){
    header("location: login.php");
}


?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Deshbord/Student Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <!--=== Reset Css ===-->
    <!--=== Animate ===-->
    <link rel="stylesheet" href="../css/plugin/animate.css">
    <!--=== Bootstrap ===-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <!--=== Fontawesome icon ===-->
    <link rel="stylesheet" href="../css/font-awesome.all.min.css">
    <!--=== Main Css ===-->
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!--===============================================================================-->
    <nav id="mainNav">
        <div class="displaySize">
            <div id="logo">
                <!--<img width="150px" src="mh2.png"/>-->
                <a class="text-decoration-none" href="index.php?page=deshboard"><h2 class="text-info py-2">K.A. High School</h2></a>
            </div>
            <div id="menuContener" class="py-2">
                <ul id="paimary_menu">
                    <li><a class="text-info" href="index.php?page=user_profile"><i class="fa fa-user"></i>Welcome : Gazi Mehedi Hasan</a></li>
                    <li><a class="text-info" href="registation.php"><i class="fa fa-user-plus"></i>Add Users</a></li>
                    <li><a class="text-info" href="index.php?page=user_profile"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a class="text-danger" href="logout.php"><i class="fa fa-power-off"></i>Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 pt-4">
                <div class="list-group">
                    <a href="index.php?page=deshboard" class="list-group-item list-group-item-action active bg-info border-info">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Students </a>
                    <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Students </a>
                    <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users </a>
                </div>
            </div>
            <div class="col-sm-9 pt-4">
                <?php 
                if(isset($_REQUEST["page"])){
                    $page = $_REQUEST["page"].".php";
                }else{
                    $page = "deshboard.php";
                }
                
                if(file_exists($page)){
                    require_once($page);
                }else{
                    require_once("404.php");
                }
                
                ?>
            </div>
        </div>
    </div>
    <footer class="text-center bg-info">
        <h6 class="py-3"><a href="gazimehedihasa.com" class="text-white">Copyright &copy; 2020 students management system Allright reserved</a></h6>
    </footer>
    <!--==================================================================-->
    
    <!--=== All Plugin ===-->
    <script defer type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script defer type="text/javascript" src="../js/plugin/jquery.magnific-popup.min.js"></script>
    <script defer type="text/javascript" src="../js/font-awesome.all.min.js"></script>

    <!--=== All Active ===-->

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        $(document).ready(function() {
        $('#data').DataTable();
        } );
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
</body>

</html>