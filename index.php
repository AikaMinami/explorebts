<?php
session_start();
 
if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != '' && $_SESSION['role_id'] == 1) {                        
    header('location:homeAdmin.php');      
    exit();          
} else if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != '' && $_SESSION['role_id'] == 2) {                        
    header('location:homeVendor.php');      
    exit();          
} else if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != '' && $_SESSION['role_id'] == 3) {            
    header('location:homeUser.php');        
    exit();
} else {
    header('location:landingPage.html');    
    exit();
}
?>