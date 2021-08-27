<div class="content">
    <h1 class="text-info"> <i class="fas fa-tachometer-alt"></i> Dashboard <small class="text-dark">Statistics Overview</small> </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
    </ol>
    <?php
    $all_student = mysqli_query($connect,"SELECT * FROM `users`");
    $count_student = mysqli_num_rows($all_student);
    
    $all_users = mysqli_query($connect,"SELECT * FROM `studentinfo`");
    $count_users = mysqli_num_rows($all_users);
    
    ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="card bg-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-users text-white fa-5x"></i>
                        </div>
                        <div class="col-sm-9">
                            <div class="text-right text-white" style="font-size:45px;"><?php echo $count_users; ?></div>
                            <div class="text-right text-white">All Students</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <a class="text-decoration-none" href="index.php?page=all-student">
                        <span class="text-left text-primary">All Students</span>
                        <span class="float-right text-primary" style="font-size:18px;"><i class="fas fa-arrow-alt-circle-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-3">
                            <i class="fa fa-user text-white fa-5x"></i>
                        </div>
                        <div class="col-sm-9">
                            <div class="text-right text-white" style="font-size:45px;"><?php echo $count_student; ?></div>
                            <div class="text-right text-white">All Users</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <a class="text-decoration-none" href="index.php?page=all-users">
                        <span class="text-left text-info">All Users</span>
                        <span class="float-right text-info" style="font-size:18px;"><i class="fas fa-arrow-alt-circle-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3>New Students</h3>
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Class</th>
                <th>City</th>
                <th>Pcontact</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
           <?php
            $students_query = "SELECT * FROM studentinfo";
            $run_query = mysqli_query($connect,$students_query);
            while($row = mysqli_fetch_array($run_query)){?>
                <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo ucwords($row["name"]); ?></td>
                <td><?php echo $row["roll"]; ?></td>
                <td><?php echo $row["class"]; ?></td>
                <td><?php echo ucwords($row["city"]); ?></td>
                <td><?php echo $row["pcontact"]; ?></td>
                <td><img style="width:60px;border-radius:50px;" src="../student_img/<?php echo $row["photo"]; ?>" alt="profile"></td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>