<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/logo-bts.png" type="image/x-icon">

  <title>List Product - Explore BTS</title>

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

  <h1>Products</h1>
  <!-- Page Content -->
  <div class="container my-2">
    <div class="row">
      <!-- table -->
      <table class="table table-striped">
      <tr>                    
        <th class="text-center">ID</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Vendor</th>
        <th>Description</th>
        <th>Settings</th>
      </tr>
      <?php
          include "connection.php";
          $query = "SELECT * FROM products p INNER JOIN users u ON p.vendor_id = u.user_id";
          $result = mysqli_query($connect, $query);

          if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
      ?>
        <tr>                    
          <td class="text-center"><?php echo $row["product_id"] ?></td>
          <td><?php echo "<img src='uploads/product_pict/".$row['product_pict']."' width='50px'>";?></td>
          <td><?php echo $row["product_name"] ?></td>
          <td><?php echo $row["category_code"] ?></td>
          <td><?php echo $row["unit_price"] ?></td>
          <td><?php echo $row["product_stock"] ?></td>
          <td><?php echo $row["username"] ?></td>
          <td width="400px"><?php echo $row["product_desc"] ?></td>
          <td>
              <a href="deleteProductProcess.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button></a>
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
  <?php include "components/footer.php"?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>