<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body body onload="getLocation()">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <input type="hidden" name="latitude"   value=""> 
                        <input type="hidden" name="longitude"   value=""> 
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    </script>
    <!-- get location -->
    <script type="text/javascript">
        function getLocation()
        {
            if(navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showPosition)
            }
        }
      function showPosition(position)
         {
                document.querySelector('.form-group input[name = "latitude"]').value = position.coords.latitude;
                document.querySelector('.form-group input[name = "longitude"]').value = position.coords.longitude;
         }
      
       /* showError(error)
        {
              switch(error.code)
            {
                case error.PERMISSION_DENIED:
                    alert("you must allow the request for geolocation to fill out the form ");
                     location.reload();
                     break;
            }
         }*/
    
     </script>  
</body>
</html>