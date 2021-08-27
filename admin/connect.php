<?php

	$host = "localhost";
	$dbUser = "studentproject";
	$dbPwd = "studentproject512";
	$dbName = "studentproject";
	$connect = mysqli_connect($host,$dbUser,$dbPwd,$dbName);
	if($connect==false):
        echo "<h1>Error establishing databse connected!</h1>";
	endif;