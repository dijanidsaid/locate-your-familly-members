<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    table{
        position: absolute;
        top: 55%;
        left: 50%;
        width: 60%;
        height: 50%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
        background: #6665ee;
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">Find me </a>
    <button type="button" class="btn btn-light"><a href="familly.php">familly</a></button>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    
    </nav>
    <!--<h1>Welcome <//?php echo $fetch_info['name'] ?></h1>-->
    <table border = 2  cellspacing = 0 cellpadding = 10 >
    <tr>
        <td>#</td>
        <td>Name</td>
        <!--<td>Email</td>-->
        <td>Map</td>
    </tr>
    <?php
    require 'connection.php';
    //require 'controllerUserData.php';
    $rows = mysqli_query($con, "SELECT * FROM usertable where email = '" .$fetch_info['email']. "'  order by id  desc ");
    $i = 1 ;
    foreach($rows as $row ) :
    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <!--<td><?php //echo $row["email"]; ?></td>-->
        <td style="width : 450px ; height : 450px ;"><iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"];?>,<?php echo $row["longitude"];?>&hl=es;z=14&output=embed' width="100%" height="100%"> </iframe></td>
    </tr>
    <?php endforeach ;?>
    </table>
</body>
</html>