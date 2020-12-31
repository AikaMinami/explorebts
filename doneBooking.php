<?php    
    include "connection.php";        
    $booking_id = $_GET['booking_id'];

    $query = "UPDATE bookings SET booking_status = 'DONE'
                WHERE booking_id = $booking_id;";      
    
    if (mysqli_query($connect, $query)) {                        
        echo "<script>alert('Update Successfull '); window.location.href='listOrdered.php'</script>";
    } else {            
        echo "<script>alert('Cannot Proceed ." .  mysqli_error($connect) . "'); window.location.href='listOrdered.php'</script>";
    }    
?>
