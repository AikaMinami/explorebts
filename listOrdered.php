<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ordered List - Explore BTS</title>

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
        background: linear-gradient(to bottom, #cccccc 0%, #ffffff 100%);
    }

    </style>
</head>

<body>

  <!-- Navigation -->
  <?php
  include 'components/navbarVendor.php';
  ?>

  <h1>Ordered List</h1>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <?php
            include 'components/sideMenuVendor.php';
        ?>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row">
          <?php
                session_start();
                include "connection.php";
                $vendor_id = $_SESSION['user_id'];
                $query = "SELECT * FROM bookings INNER JOIN products
                 ON bookings.product_id = products.product_id
                  WHERE vendor_id = '$vendor_id'";
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <!-- product card -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <img class="card-img-top" src="uploads/product_pict/<?php echo $row['product_pict'];?>" alt="">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $row['product_name'];?></h5>
                          <h5>Rp <?php echo $row['unit_price'];?></h5>
                      </div>
                      <div class="card-footer">                            
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['product_id']; ?>">Check > </button>
                      </div>
                </div>
            </div>
          <!-- /.product card -->
          <!-- modal -->
          <div id="modal<?php echo $row['product_id'];?>" class="modal fade" role="dialog" >
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo $row['product_name'];?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body" style="align-items: center;">
                    <img class="img-fluid" src="uploads/<?php echo $row['product_pict'];?>" alt="">
                    <?php echo $row['product_desc']; ?>
                    <br> <br> <br>
                    <p>Product Stock : <?php echo $row['product_stock']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          <!-- /.modal -->
          <?php
                    }
                } else{
                    echo "0 result";
                }
            ?>
           
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  
  <!-- Footer -->
    <?php
        include 'components/footer.php';
    ?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>