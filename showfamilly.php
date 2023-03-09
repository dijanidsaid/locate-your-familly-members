<?php require_once "controllerUserData.php"; ?>
<?php 

     
    $db = mysqli_connect("localhost", "root", "", "userform") or die('Not Connected');
    mysqli_set_charset($db, 'utf8');

    $sql = mysqli_query($db,"SELECT * FROM usertable WHERE email = '" .$_SESSION['email']. "'");
    $sql = mysqli_fetch_assoc($sql);
    $Checker = $sql['email'];
    
    if  ($Checker != null) {
        $rows = mysqli_query($db,"SELECT * FROM usertable WHERE email = '" .$_SESSION['email']. "'");
        $i = 1 ;
        
        
        echo "<table border = 1  cellspacing = 0 cellpadding = 10 >";
        echo "<tr>
            <td>#</td>
            <td>Name</td>";
            //<td>Email</td>
            echo "<td>Map</td>";
        echo "</tr>";
        foreach($rows as $row ) :
        echo "<tr>";
        echo "<td>"; echo $i++; ;echo"</td>";
        echo "<td>"; echo $row["name"]; echo "</td>";
        //echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td style='width : 450px ; height : 450px ;''>";echo "<iframe src='https://www.google.com/maps?q=";echo $row["latitude"];echo ","; echo $row["longitude"];echo "&hl=es;z=14&output=embed' width=100% height=100%>"; echo "</iframe></td>";
        echo "</tr>";
         endforeach ;
        echo "</table>" ;
       //echo "</div>";
    
    } if ($Checker = null)
     {

        echo 'Not found';
      
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>track your familly </title>
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
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    
    </nav>
</body>
