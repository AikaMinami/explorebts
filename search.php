<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="shortcut icon" href="assets/logo-bts.png" type="image/x-icon">
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/shop-homepage.css" rel="stylesheet">

        <title>Search</title>
        <style>
        .navbar{
            background-color: #f4623a;
        }

        .form-control{
            font-weight: bold; 
        }
    </style>
    </head>
    <body>
    <div class="container"> 
        <?php
            include "connection.php";
            session_start();                
            
            $keyword = $_GET['keyword'];
            $user_id = $_SESSION['user_id'];            
                        
            if($_SESSION['role_id'] == 2) {
                $query = "SELECT * FROM products WHERE product_name LIKE '%$keyword%' AND vendor_id = $user_id";                
                include "components/navbarVendor.php";
            } else if($_SESSION['role_id'] == 3) {
                $query = "SELECT * FROM products WHERE product_name LIKE '%$keyword%'";
                include "components/navbarUser.php"; 
            } 

            $result = mysqli_query($connect, $query);
        ?>  
        </div>  
        <div class="container">       
        <!-- search bar          -->
            <form action="search.php" method="GET" class="form-inline justify-content-center pt-4">
                <input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" name="keyword" value="<?php echo $keyword ?>">
                <button class="btn my-2 my-sm-0 search-button" type="submit" style="background-color:#f4623a; color:white">Search</button>
            </form>
            <br>
            <h2>Showing search result of <?php echo $keyword ?> : </h2><br>
            <div class="row">
                <?php                    
                    if(mysqli_num_rows($result) > 0) {
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
                                        <div class="row">
                                            <?php
                                                if($_SESSION['role_id'] == 2) { ?>
                                                    <div class="card-footer">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['product_id']; ?>">Check > </button>
                                                    </div>
                                                <?php
                                                } else if($_SESSION['role_id'] == 3) {?>
                                                    <a href="booking.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-primary">Booking!</button></a>
                                                    <?php
                                                }                                                 
                                            ?>                                                                                        
                                        </div>                                                                
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
                                    <img class="img-fluid" src="uploads/product_pict/<?php echo $row['product_pict'];?>" alt=""><br><br>
                                    <?php echo $row['product_desc']; ?>
                                </div>
                            
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <a href="updateForm.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-primary" >Update Item</button></a>
                                    <a href="deleteProductProcess.php?product_id=<?php echo $row['product_id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete Item</button></a>
                                </div>
                        
                                </div>
                            </div>
                            </div>
                            <!-- /.modal -->                                   
                            <?php
                        }
                    } else {
                        echo "0 result";
                    }  
                ?>
                
            </div>        
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
    </body>
</html>
