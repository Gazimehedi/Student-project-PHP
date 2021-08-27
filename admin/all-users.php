 <h1 class="text-info"> <i class="fas fa-user"></i> All Users <small class="text-dark">all users</small> </h1>
 <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page"><a class="text-decoration-none text-info" href="index.php?page=deshboard"><i class="fas fa-tachometer-alt" ></i> Dashboard</a></li>
     <li class="breadcrumb-item active" aria-current="page" ><i class="fas fa-user" ></i> All Users</li>
 </ol>
 <table id="data" class="table table-hover table-bordered table-striped">
     <thead>
         <tr>
             <th>Name</th>
             <th>Email</th>
             <th>Username</th>
             <th>Photo</th>
         </tr>
     </thead>
     <tbody>
         <?php
            $users_query = "SELECT * FROM users";
            $run_query = mysqli_query($connect,$users_query);
            while($row = mysqli_fetch_array($run_query)){ ?>
         <tr>
             <td><?php echo ucwords($row["name"]); ?></td>
             <td><?php echo $row["email"]; ?></td>
             <td><?php echo $row["username"]; ?></td>
             <td><img style="width:60px;border-radius:50px;" src="../img/<?php echo $row["photo"]; ?>" alt="profile"></td>
         </tr>
         <?php } ?>
     </tbody>
 </table>