<?php
require_once("connect.php");
$get_id = base64_decode($_REQUEST["id"]);
$dl_query = "DELETE FROM studentinfo WHERE id=$get_id";
$runquery = mysqli_query($connect,$dl_query);
if($runquery==true){
    header("location: index.php?page=all-student");
}

?>