<?php
    include "connection.php";
    
    $booking_id = $_GET['booking_id'];
    
    $query = "DELETE FROM bookings WHERE booking_id = $booking_id";
    
    if (mysqli_query($connect, $query)) {                     
        echo "<script>alert('Delete Success '); window.location.href='myOrder.php'</script>";
    } else {                
        echo "<script>alert('Delete Failed <br>" .  mysqli_error($connect) . "'); window.location.href='myOrder.html'</script>";
    }
?>