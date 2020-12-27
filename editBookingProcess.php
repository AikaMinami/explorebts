<?php    
    include "connection.php";    
    $product_id = $_GET['product_id'];
    $booking_id = $_GET['booking_id'];
    $booking_date = $_POST['booking_date'];    
    $quantity = $_POST['quantity'];
    $booking_days = $_POST['booking_days'];
    
    $query = "SELECT * FROM bookings WHERE booking_id = $booking_id";    
    $rowBooking = mysqli_fetch_array(mysqli_query($connect, $query));
    $initialQty = $rowBooking['quantity'];

    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $rowProduct = mysqli_fetch_array(mysqli_query($connect, $query));
    $currentStock = $rowProduct['product_stock'];

    $modifiedStock = $initialQty + $currentStock - $quantity;

    $query = "UPDATE bookings SET booking_date = '$booking_date', quantity = $quantity, 
                booking_days = $booking_days WHERE booking_id = $booking_id;";      
    
    if (mysqli_query($connect, $query)) {                
        $query = "UPDATE products SET product_stock = $modifiedStock WHERE product_id = $product_id;";
        if (mysqli_query($connect, $query)) {            
            echo "<script>alert('Update Successfull '); window.location.href='myOrder.php'</script>";
        } else {
            echo "<script>alert('Can't Connect ." .  mysqli_error($connect) . "'); window.location.href='homeUser.php'</script>";
        }
    } else {            
        echo "<script>alert('Can't Proceed ." .  mysqli_error($connect) . "'); window.location.href='homeUser.php'</script>";
    }
       
?>
