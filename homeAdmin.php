<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
  <link rel="shortcut icon" href="assets/logo-bts.png" type="image/x-icon">

  <title>HomeBTS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style>
    .navbar{
        background-color: #f4623a;
    }
    </style>
</head>

<body>
  <!-- Navigation -->
  <?php session_start(); 
    include 'components/navbarAdmin.php';
  ?> 
  <!-- Page Content -->
  <div class="container my-3">
    <?php 
    $username = $_SESSION['username'];?>
    <h1>Welcome, <?php echo $username; ?>!</h1><br>

    <!-- carousel -->
    <div id="myCarousel" class="carousel slide text-center mx-auto" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid mx-auto" src="assets/slider-jumbotron-1.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid mx-auto" src="assets/slider-jumbotron-2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid mx-auto" src="assets/slider-jumbotron-3.png" alt="Third slide">
        </div>        
      </div>      
    </div>
    <!-- /.carousel -->
    <div class="row mt-5">
        <!-- Users -->
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="listUser.php" class="stretched-link" style="text-decoration: underline; color: black">
            <div class="card h-100">                
              <h3 class="card-title text-center mt-4">Users</h3>                
              <div class="card-body text-center">
                <img class="card-img-top" style="width: 150px" src="assets/img/user.png" alt="user">
              </div>
            </div>
          </a>
        </div>
        <!-- Products -->
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="listProduct.php" class="stretched-link" style="text-decoration: underline; color: black">
            <div class="card h-100">                
              <h3 class="card-title text-center mt-4">Products</h3>                
                <div class="card-body text-center">
                  <img class="card-img-top" style="width: 150px" src="assets/img/products.png" alt="user">
                </div>
            </div>
          </a>
        </div>
        <!-- Bookings -->
        <div class="col-lg-4 col-md-6 mb-4">
          <a href="listBooking.php" class="stretched-link" style="text-decoration: underline; color: black">
            <div class="card h-100">                
              <h3 class="card-title text-center mt-4">Bookings</h3>                
                <div class="card-body text-center">
                  <img class="card-img-top" style="width: 150px" src="assets/img/bookings.png" alt="user">                  
                </div>
            </div>
          </a>
        </div>
    </div>
</div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;  2020 - Group 1 Web Programming Design TI-2H</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
