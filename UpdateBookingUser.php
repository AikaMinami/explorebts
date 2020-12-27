<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Update Booking - Explore BTS</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/shop-homepage.css" rel="stylesheet">
        <style>
            .navbar{
                background-color: #f4623a;
            }

            td{
                padding-right: 25px;
                padding-bottom: 10px;
            }
            h1{
                text-align: center;
                padding-top: 25px;
                padding-bottom: 10px;
                color: white;
            }
            body{
                background: linear-gradient(to bottom, #f4623a 0%, #343a40 100%);   
                color: #343a40;
            }
            input[type=button], input[type=submit], input[type=reset]{
                border: 1px;
                color: #343a40;
                padding: 16px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <!-- navbar -->
        <?php
                include 'components/navbarUser.php';
            // /.navbar
                include "connection.php";
                $id = $_GET['product_id'];
                $query = "SELECT * FROM bookings WHERE product_id = '$id'";
                $result = mysqli_query($connect, $query);
            ?>
          <!--form!-->
          
          <h1>Update Booking Page</h1> 
            <div class="card container">
            <div class="card-body" style="font-weight: bold;">
            <br>
            <form action="editBookingProcess.php?product_id=<?php echo $_GET['product_id']?>" method="POST">
            
            <?php
                while($row = mysqli_fetch_array($result)){
            ?>             
                            <div class="mb-3">
                                <label for="booking_date" class="form-label" >Booking Date (yyyy-mm-dd)</label>
                                <input type="text" class="form-control disabled" name="booking_date" value="<?php echo $row['booking_date']?>" require>                                
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" name="quantity" value="<?php echo $row['quantity']?>" require>                                
                            </div>
                            <div class="mb-3">
                                <label for="booking_days" class="form-label">Booking Days (Length Of Booking)</label>
                                <input type="text" class="form-control" name="booking_days" value="<?php echo $row['booking_days']?>" require>                                
                            </div>
                                                
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>    
                </div>
                <?php
                    }
                ?>   
        <!-- Footer -->
        <?php
            include 'components/footer.php';
        ?>
    </body>
</html>