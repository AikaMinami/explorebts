<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/logo-bts.png" type="image/x-icon">

  <title>List Booking - Explore BTS</title>

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

  <h1>Booking</h1>
  <!-- Page Content -->
  <div class="container">
        <div class="row">
          <!-- table -->
          <table class="table table-striped">
            <tr>
                <th class="text-center">ID</th>
                <th>Tourist</th>
                <th>Booking Date</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Day(s)</th>
                <th>Status</th>
                <th>Settings</th>
            </tr>
            <?php
              include "connection.php";
              $query = "SELECT * FROM bookings s INNER JOIN users u ON u.user_id = s.tourist_id
                        INNER JOIN products p ON p.product_id = s.product_id";
              $result = mysqli_query($connect, $query);

              if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){                 
            ?>
            <tr>
              <td class="text-center"><?php echo $row["booking_id"] ?></td>
              <td><?php echo $row["username"] ?></td>
              <td><?php echo $row["booking_date"] ?></td>
              <td><?php echo $row["product_name"] ?></td>
              <td><?php echo $row["quantity"] ?></td>
              <td><?php echo $row["booking_days"] ?></td>
              <td><?php echo $row["booking_status"] ?></td>
              <td>
                  <a href="deleteBookingProcess.php?booking_id=<?php echo $row['booking_id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button></a>
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