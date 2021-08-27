<h1 class="text-primary"> <i class="fas fa-user"></i> User Profile <small class="text-dark">My Profle</small> </h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php?page=deshboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i>User Profile</li>
</ol>
<?php
$get_user = $_SESSION["user_login"];
$user_sl = "SELECT * FROM `users` WHERE `username`='$get_user'";
$runquery = mysqli_query($connect,$user_sl);
$userinfo = mysqli_fetch_array($runquery);
?>
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>User id</td>
                <td><?= $userinfo["id"] ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $userinfo["name"] ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $userinfo["username"] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $userinfo["email"] ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= $userinfo["status"] ?></td>
            </tr>
            <tr>
                <td>Signu date</td>
                <td><?= $userinfo["signupdate"] ?></td>
            </tr>
        </table>
        <a href="index.php?page=edit_user&editusername=<?php echo base64_encode($get_user);?>" class="btn btn-info btn-sm float-right">Edit Profile</a>
    </div>
    <div class="col-md-6" id="profile">
        <a style="position:relative;">
            <img style="width:300px;height:300px;" class="img-thumbnail" src="../img/<?= $userinfo["photo"] ?>" alt="profile">
            <botton class="btn btn-info btn-sm" id="img-btn"><i class="fa fa-pencil-alt"></i></botton>
        </a>
        <label style="display:block;">Profile Picture</label>
        <?php 
        if(isset($_REQUEST["upload"])){
            $username = $userinfo["username"];
            $photo_name = $username.'.jpg';
            $tmp_name = $_FILES["photo"]["tmp_name"];
            
            $up_photo = "UPDATE `users` SET `photo`='$photo_name' WHERE `username`='$username'";
            $runquery = mysqli_query($connect,$up_photo);
            if($runquery){
                move_uploaded_file($tmp_name,"../img/$photo_name");
            }
        }
        
        ?>
        <form class="mt-2" action="" method="post" enctype="multipart/form-data" id="upload-form">
            <input type="file" name="photo" id="photo" required>
            <input type="submit" name="upload" value="Upload" class="btn btn-info btn-sm mt-2" style="display:block;">
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#img-btn").click(function() {
            $("#upload-form").css("opacity", "1");
        });
    });
</script>