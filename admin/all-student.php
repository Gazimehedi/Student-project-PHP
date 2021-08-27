 <h1 class="text-info"> <i class="fas fa-users"></i> All Students <small class="text-dark">all student</small> </h1>
 <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-info" href="index.php?page=deshboard"><i class="fas fa-tachometer-alt" ></i> Dashboard</a></li>
     <li class="breadcrumb-item active" aria-current="page" ><i class="fas fa-users" ></i> All Students</li>
 </ol>
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
             <th>Action</th>
         </tr>
     </thead>
     <tbody>
         <?php
            $students_query = "SELECT * FROM studentinfo";
            $run_query = mysqli_query($connect,$students_query);
            while($row = mysqli_fetch_array($run_query)){ ?>
         <tr>
             <td><?php echo $row["id"]; ?></td>
             <td><?php echo ucwords($row["name"]); ?></td>
             <td><?php echo $row["roll"]; ?></td>
             <td><?php echo $row["class"]; ?></td>
             <td><?php echo ucwords($row["city"]); ?></td>
             <td><?php echo $row["pcontact"]; ?></td>
             <td><img style="width:60px;border-radius:50px;" src="../student_img/<?php echo $row["photo"]; ?>" alt="profile"></td>
             <td class="text-primary"><a class="btn btn-sm btn-warning" href="index.php?page=edit_studentinfo&editid=<?php echo base64_encode($row["id"]);?>"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete!')" class="btn btn-sm btn-danger" href="delete_core.php?id=<?php echo base64_encode($row["id"]); ?>"><i class="fas fa-trash"></i>&nbsp; Delete</a></td>
         </tr>
         <?php } ?>
     </tbody>
 </table>