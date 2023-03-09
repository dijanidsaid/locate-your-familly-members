<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track your familly</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="familly.php" method="POST" autocomplete="off">
                    <h2 class="text-center"> enter informations to track ur familly </h2>
                    
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="valider" value="valider">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
