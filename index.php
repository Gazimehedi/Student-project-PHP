<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Student Management System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!--=== Reset Css ===-->
        <link rel="stylesheet" href="css/normalize.css">
        <!--=== Animate ===-->
        <link rel="stylesheet" href="css/plugin/animate.css">
        <!--=== Hover Animation ===-->
        <link rel="stylesheet" href="css/plugin/hover-min.css">
        <!--=== Bootstrap ===-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--=== Fontawesome icon ===-->
        <link rel="stylesheet" href="css/font-awesome.all.min.css">
        <!--=== Owl carousel ===-->
        <link rel="stylesheet" href="css/plugin/owl.carousel.min.css">
        <!--=== Magnific PopUp ===-->
        <link rel="stylesheet" href="css/plugin/magnific-popup.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--===============================================================================-->
        
        <div class="container">
            <div class="row"> 
                <div class="col-sm-12"> 
                    <a class="btn btn-primary float-right mt-3" href="admin/login.php">Login</a>
                </div>
                <div class="col-sm-12"> 
                    <h1 class="text-center pt-2">Welcome to Students Management System</h1>
                </div>
            </div>
           
            <div class="row mt-4">
                <div class="col-sm-6 offset-sm-3">
                    <form action="" method="post">
                        <table class="table table-bordered"> 
                            <tr>
                                <td class="text-center font-width-bold" colspan="2"><label for="">Student Information</label></td>
                            </tr>
                            <tr>
                                <td><label for="chose">Choose Class</label></td>
                                <td>
                                    <select class="form-control" name="chose" id="chose">
                                        <option value="seleted">select</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="roll">Roll No</label></td>
                                <td>
                                    <input class="form-control" id="roll" name="roll" type="text" pattern="[0-9]{6}" placeholder="Enter your roll" >
                                </td>
                            </tr>
                            <tr> 
                                <td class="text-center" colspan="2">
                                    <input class="btn btn-outline-dark" type="submit" value="Show Info" name="showinfo">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
<?php 
   require_once("admin/connect.php");
            if(isset($_REQUEST["showinfo"])){
                $class = $_REQUEST["chose"];
                $roll = $_REQUEST["roll"];
                $search_query = "SELECT * FROM `studentinfo` WHERE `roll`= '$roll' and `class`= '$class'";
                $runquery = mysqli_query($connect,$search_query);
                if(mysqli_num_rows($runquery)==1){
            $getdata = mysqli_fetch_array($runquery);
            ?>
                    <div class="row">
                <div class="col-md-6 offset-md-3">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="4" class="text-center"><img style="width:170px;" class="img-thumbnail" src="student_img/<?= $getdata["photo"] ?>" alt="student image"></td>
                            <td>Name</td>
                            <td><?= ucwords($getdata["name"]) ?></td>
                        </tr>
                        <tr>
                            <td>Roll</td>
                            <td><?= $getdata["roll"] ?></td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td><?= $getdata["class"] ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?= ucwords($getdata["city"]) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
             <?php   }else{ ?>
                 <script>
                    alert("Data Not found!");
                 </script>
               <?php }} ?>
            
        </div>
        

        <!--==================================================================-->
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <!--=== All Plugin ===-->
        <script defer type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script defer type="text/javascript" src="js/plugin/wow.min.js"></script>
        <script defer type="text/javascript" src="js/plugin/owl.carousel.min.js"></script>
        <script defer type="text/javascript" src="js/plugin/jquery.magnific-popup.min.js"></script>
        <script defer type="text/javascript" src="js/font-awesome.all.min.js"></script>

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
