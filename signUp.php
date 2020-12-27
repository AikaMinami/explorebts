<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
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
            .card-body{
            font-weight : bold;
         }
        </style>
    </head>
    <body>
    <?php
        include 'components/navbarGeneral.php';
    ?>
        <br>
        <h1>Sign Up</h1>
        <div class="card container">
            <div class="card-body">
                <form action="signUpProcess.php" method="POST" enctype="multipart/form-data">                
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>                                
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role-id" class="form-label">Role ID</label>
                        <select class="form-select" name="role_id" required>
                            <option selected disabled hidden>Open this select menu</option>
                            <option value="1">Vendor</option>
                            <option value="2">Tourist</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="profile-pict" class="form-label">Profile Picture</label>
                        <input class="form-control" type="file" name="profile_pict">
                    </div>                            
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>    
        </div>
        <br>
        <br>
        <br>
        <br>
        <?php
        include 'components/footer.php';
        ?> 
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>             
    </body>
</html>