<?php
    include "connection.php";

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];    
    $address = $_POST['address'];
    $phone = $_POST['phone'];    
    $email = $_POST['email'];
    $password = MD5($_POST['password']);    
    $role_id = $_POST['role_id'];
    $profile_pict = $_FILES['profile_pict']['name'];
    
    $target_path="uploads/profile_pict/";
    $target_path = $target_path . basename($profile_pict);

    $query = "SELECT * FROM users WHERE username = '$username' OR phone = '$phone' OR email = '$email'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username atau email atau nomor telp sudah pernah dipakai." .  mysqli_error($connect) . "'); window.location.href='signUp.php'</script>";
    }

    move_uploaded_file($_FILES['profile_pict']['tmp_name'], $target_path);    

    $query = "INSERT INTO users (fullname, username, address, phone, email, password, role_id, profile_pict) VALUES
              ('$fullname', '$username', '$address', '$phone', '$email', '$password', $role_id, '$profile_pict')";
    
    if (mysqli_query($connect, $query)) {        
        session_start();
        $query = "SELECT * FROM users WHERE username = '$username'";
        $row = mysqli_fetch_array(mysqli_query($connect, $query));
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role_id'] = $role_id;        
        $_SESSION['login'] = true;        
        if($role_id == 2){            
            echo "<script>alert('Sign Up Success! '); window.location.href='homeVendor.php'</script>";
        } else if($role_id == 3){            
            echo "<script>alert('Sign Up Success!'); window.location.href='homeUser.php'</script>";
        } 
    } else {                
        echo "<script>alert('Sign Up Failed! " .  mysqli_error($connect) . "'); window.location.href='signUp.php'</script>";
    }
?>