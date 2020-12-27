<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/styleLogin.css" rel="stylesheet" />
        <style>
            .navbar{
                background-color: #f4623a;
            }
            h1{
                text-align:center;
            }
            </style>     
</head>
<body>
        <?php
            include "connection.php";
            session_start();                
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM users WHERE user_id = $user_id;";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);
                                    
            if($_SESSION['role_id'] == 1) {
                include "components/navbarVendor.php";
            } else if($_SESSION['role_id'] == 2) {
                include "components/navbarUser.php"; 
            } 
        ?> 
        <br><br><br><br>
    <h1>Forgot Your Password?</h1>
    <div class="card container">
        <div class="card-body">
            <?php
                $user_id = $_GET['user_id'];
            ?>        
            <form method="POST" action="changePasswordProcess.php?user_id=<?php echo $user_id?>">                
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Old Password</label>
                    <input type="password" class="form-control" name="oldPassword">                                
                </div>     
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="newPassword">                                
                </div>          
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>    
    </div>
    <?php
        include 'components/footer.php';
    ?>   
</body>
</html>