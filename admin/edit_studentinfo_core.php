<?php
   require_once("connect.php");
   if(isset($_REQUEST["updateinfo"])){
    $name = $_REQUEST["name"];
    $roll = $_REQUEST["roll"];
    $city = $_REQUEST["city"];
    $pcontact = $_REQUEST["pcontact"];
    $class = $_REQUEST["class"];
    $editid = $_REQUEST["editid"];
       
    $updatequery = "UPDATE studentinfo SET name='$name',roll='$roll',class='$class',city='$city',pcontact='$pcontact' WHERE id=$editid";
	$runupquery = mysqli_query($connect,$updatequery);
    if($runupquery==true){
        header("location: index.php?page=all-student");
    }
}

?>