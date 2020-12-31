<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/logo-bts.png" type="image/x-icon">

  <title>List User - Explore BTS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style>
    .navbar{
        background-color: #f4623a;
    }

    h1{
        padding-top: 25px;
        text-align: center;
        padding-bottom: 25px;
        color: #404040;
    }

    </style>
</head>

<body>

  <!-- Navigation -->
  <?php
  include 'components/navbarAdmin.php';
  ?>

  <h1>User</h1>
  <!-- Page Content -->
  <div class="container">
        <div class="row">
          <!-- table -->
          <table class="table table-striped">
            <tr>                    
              <th class="text-center">ID</th>
              <th>Picture</th>
              <th>Name</th>
              <th>Username</th>                    
              <th>Phone</th>
              <th>Email</th>
              <th>Role</th>
              <th>Settings</th>
            </tr>
            <?php
              include "connection.php";
              $query = "SELECT * FROM users u INNER JOIN roles r ON r.role_id = u.role_id;";
              $result = mysqli_query($connect, $query);

              if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
            ?> 
            <tr>                
              <td class="text-center"><?php echo $row["user_id"] ?></td>
              <td><?php echo "<img src='uploads/profile_pict/".$row['profile_pict']."' width='50px' height='50px'>";?></td>
              <td><?php echo $row["fullname"] ?></td>
              <td><?php echo $row["username"] ?></td>                
              <td><?php echo $row["phone"] ?></td>
              <td><?php echo $row["email"] ?></td>
              <td><?php echo $row["role_name"] ?></td>
              <td>
                <a href="deleteAccountProcess.php?user_id=<?php echo $row['user_id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button></a>
              </td>
            </tr>
            <!-- /.table -->
          <?php              
              } 
              echo "</table>";
          } else{
              echo "0 result";
          }
          ?> 
        </div>
        <!-- /.row -->

  </div>
  <!-- /.container -->
  
  <!-- Footer -->
  <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2020 - Group 1 Web Programming Design TI-2H</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>