<?php
    include "connection.php";

    $user_id = $_GET['user_id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];    
    $address = $_POST['address'];
    $phone = $_POST['phone'];    
    $email = $_POST['email'];        
    $profile_pict = $_FILES['profile_pict']['name'];
    
    if(empty($profile_pict)) {
        $query = "SELECT profile_pict FROM users WHERE user_id = $user_id";
        $rowUser = mysqli_fetch_array(mysqli_query($connect, $query));
        $profile_pict = $rowUser['profile_pict'];
    } 

    $target_path="uploads/profile_pict/";
    $target_path = $target_path . basename($profile_pict);

    move_uploaded_file($_FILES['profile_pict']['tmp_name'], $target_path);    

    $query = "UPDATE users SET fullname = '$fullname', username = '$username', address = '$address', 
                phone = '$phone', email = '$email', profile_pict = '$profile_pict' WHERE user_id = $user_id;";
    
    if (mysqli_query($connect, $query)) {                       
        echo "<script>alert('Update Success! '); window.location.href='profile.php'</script>";        
    } else {        
        echo "<script>alert('Update Failed <br>." .  mysqli_error($connect) . "'); window.location.href='editAccount.php'</script>";
    }
?>