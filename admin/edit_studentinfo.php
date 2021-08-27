
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-info"> <i class="fas fa-pencil-alt"></i> Update <small class="text-dark"> student informations</small> </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-info" href="index.php?page=deshboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-info" href="index.php?page=all-student"><i class="fas fa-users"></i> All Students</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-pencil-alt"></i> Change Students Information</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
<?php
$getid = base64_decode($_REQUEST["editid"]);
$slequery = "SELECT * FROM studentinfo WHERE id=$getid";
$runquery = mysqli_query($connect,$slequery);
if(isset($getid)){
    while($getdata = mysqli_fetch_array($runquery)){ ?>
        
        <form action="edit_studentinfo_core.php" method="post" >
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" Placeholder="Student Name" id="name" value="<?php if(isset($getdata["name"])){echo $getdata["name"];}?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="roll">Roll</label>
                        <input type="text" name="roll" Placeholder="Roll No" id="roll" value="<?php if(isset($getdata["roll"])){echo $getdata["roll"];}?>" class="form-control" pattern="[0-9]{6}" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" Placeholder="City" id="city" value="<?php if(isset($getdata["city"])){echo $getdata["city"];}?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pcontact">P-contact</label>
                        <input type="text" name="pcontact" Placeholder="01*********" id="pcontact" value="<?php if(isset($getdata["pcontact"])){echo $getdata["pcontact"];}?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <select class="form-control" name="class" id="class" value="<?php if(isset($getdata["class"])){echo $getdata["class"];}?>" required>
                            <option>Select</option>
                            <option value="1st" <?php echo $getdata["class"]=='1st' ? 'selected=""':''; ?> >1st</option>
                            <option value="2nd" <?php echo $getdata["class"]=='2nd' ? 'selected=""':''; ?> >2nd</option>
                            <option value="3rd" <?php echo $getdata["class"]=='3rd' ? 'selected=""':''; ?> >3rd</option>
                            <option value="4th" <?php echo $getdata["class"]=='4th' ? 'selected=""':''; ?> >4th</option>
                            <option value="5th" <?php echo $getdata["class"]=='5th' ? 'selected=""':''; ?> >5th</option>
                        </select>
                    </div>
                    <input type="hidden" name="editid" value="<?php echo $getid; ?>">
                    <div class="text-right">
                        <input type="submit" name="updateinfo" value="Update" class="btn btn-info">
                    </div>
                </form>
        
<?php    }
}
        
?>
                
            </div>
        </div>