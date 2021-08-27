
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-info"> <i class="fas fa-pencil-alt"></i> Update <small class="text-dark"> User informations</small> </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-info" href="index.php?page=deshboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-info" href="index.php?page=user_profile"><i class="fas fa-user"></i>User Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-pencil-alt"></i> Change User Information</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <?php //if(isset($up_success){ echo "<div class='alert alert-success'>".$up_success."</div>"; } ?>
            <?php //if(isset($pwd_unmacth){ echo '<div class="alert alert-warning">'.$pwd_unmacth.'</div>'; }elseif(isset($pwd_error){ echo '<div class="alert alert-success">'.$pwd_error.'</div>'; } ?>
<?php
$getusername = base64_decode($_REQUEST["editusername"]);
$slequery = "SELECT * FROM users WHERE username='$getusername'";
$runquery = mysqli_query($connect,$slequery);
if(isset($getusername)){
    while($getdata = mysqli_fetch_array($runquery)){ 
        if(isset($_REQUEST["updateinfo"])){
            $name = $_REQUEST["name"];
            $email = $_REQUEST["email"];
            $username = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $uppassword = md5($_REQUEST["conformpwd"]);
            $repassword = md5($_REQUEST["reconformpwd"]);
            $editid = $_REQUEST["editid"];
    
            if($getdata["password"]==md5($password)){
                if($uppassword==$repassword){
                    $updatequery = "UPDATE users SET name='$name',email='$email',username='$username',password='$uppassword' WHERE id=$editid";
                    $runupquery = mysqli_query($connect,$updatequery);
                    if($runupquery){
                        $up_success = "Data Updated";
                    }
                }else{
                    $pwd_unmacth = "Password Not Match!";
                }
            }else{
                $pwd_error = "Password wrong!";
            } } 
            if(isset($up_success)){
                 echo "<div class='alert alert-success'>".$up_success."</div>";
            }
            if(isset($pwd_unmacth)){
                echo "<div class='alert alert-danger'>".$pwd_unmacth."</div>";
           }
           if(isset($pwd_error)){
            echo "<div class='alert alert-danger'>".$pwd_error."</div>";
           }
            ?>

        <form action="" method="post" >
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" Placeholder="Name" id="name" value="<?php if(isset($getdata["name"])){echo $getdata["name"];}?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" Placeholder="Email" id="email" value="<?php if(isset($getdata["email"])){echo $getdata["email"];}?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" Placeholder="Username" id="username" value="<?php if(isset($getdata["username"])){echo $getdata["username"];}?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" Placeholder="Password" id="password"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="conformpwd">New Password</label>
                        <input type="password" name="conformpwd" Placeholder="New Password" id="conformpwd" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="reconformpwd">Conform Password</label>
                        <input type="password" name="reconformpwd" Placeholder="Re-type New Password" id="reconformpwd" class="form-control" required>
                    </div>
                    <input type="hidden" name="editid" value="<?php if(isset($getdata["id"])){echo $getdata["id"];} ?>" >
                    <div class="text-right">
                        <input type="submit" name="updateinfo" value="Update" class="btn btn-info">
                    </div>
                </form>        
<?php } } ?> 
            </div>
        </div>