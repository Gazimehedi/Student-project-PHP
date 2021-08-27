 <h1 class="text-info"> <i class="fas fa-user-plus"></i> Add Students <small class="text-dark">add new student</small> </h1>
 <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-info" href="index.php?page=deshboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
     <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-plus"></i> Add Students</li>
 </ol>
<?php 
if(isset($_REQUEST["add-student"])){
    $name = $_REQUEST["name"];
    $roll = $_REQUEST["roll"];
    $city = $_REQUEST["city"];
    $pcontact = $_REQUEST["pcontact"];
    $class = $_REQUEST["class"];
    
    $photo = explode(".",$_FILES["photo"]["name"]);
    $photo_ext = end($photo);
    $photo_name = $class.$roll.'.'.$photo_ext;
    $tmp_name = $_FILES["photo"]["tmp_name"];
    
    $query = "INSERT INTO `studentinfo`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUE('$name','$roll','$class','$city','$pcontact','$photo_name')";
    $insert_query = mysqli_query($connect,$query);
    if($insert_query==true){
        $success = "Student add success";
        move_uploaded_file($tmp_name,"../student_img/$photo_name");
    }else{
        $error = "Enter your valid informations!";
    }
}

?>
  <div class="row">
    <?php 
     if(isset($success)){
         echo "<div class='col-sm-6 alert alert-success'>".$success."</div>";
     }
     if(isset($error)){
         echo "<div class='col-sm-6 alert alert-warning'>".$error."</div>";
     }
     
     ?>

 </div> 
 <div class="row">
     <div class="col-md-6">
         <form action="" method="post" enctype="multipart/form-data">
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" name="name" Placeholder="Student Name" id="name" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="roll">Roll</label>
                 <input type="text" name="roll" Placeholder="Roll No" id="roll" class="form-control" pattern="[0-9]{6}" required>
             </div>
             <div class="form-group">
                 <label for="city">City</label>
                 <input type="text" name="city" Placeholder="City" id="city" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="pcontact">P-contact</label>
                 <input type="text" name="pcontact" Placeholder="01*********" id="pcontact" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="class">Class</label>
                 <select class="form-control" name="class" id="class" required>
                     <option>Select</option>
                     <option value="1st">1st</option>
                     <option value="2nd">2nd</option>
                     <option value="3rd">3rd</option>
                     <option value="4th">4th</option>
                     <option value="5th">5th</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="photo" class="d-block">Student Photo</label>
                 <input type="file" name="photo" id="photo" required>
             </div>
             <div class="text-right">
                 <input type="submit" name="add-student" value="Add Student" class="btn btn-info">
             </div>
         </form>
     </div>
 </div>