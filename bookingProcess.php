<?php
    session_start();     
    include "connection.php";
    $username = $_SESSION['username']; 
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    
    $tourist_id = $row['user_id'];        
    $booking_date = $_POST['booking_date'];
    $product_id = $_GET['product_id'];
    $quantity = $_POST['quantity'];
    $booking_days = $_POST['booking_days'];

    $query = "INSERT INTO bookings (tourist_id, booking_date, product_id, quantity, booking_days) VALUES
                ($tourist_id, '$booking_date', $product_id, $quantity, $booking_days);";      
    
    if (mysqli_query($connect, $query)) {                
        $query = "UPDATE products SET product_stock = product_stock - $quantity WHERE product_id = $product_id;";
        if (mysqli_query($connect, $query)) {            
            echo "<script>alert('Transaction Successfull '); window.location.href='myOrder.php'</script>";
        } else {
            echo "<script>alert('Can't Connect ." .  mysqli_error($connect) . "'); window.location.href='homeUser.php'</script>";
        }
    } else {            
        echo "<script>alert('Can't Proceed ." .  mysqli_error($connect) . "'); window.location.href='homeUser.php'</script>";
    }
       
?>
