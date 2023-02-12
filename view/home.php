<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
}else{
    if($_SESSION['role'] == '0'){
       
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Roles</title>
    <style>
        body{
            background: #d0d0db;
        }

        .links{
            display: flex;
            justify-content: center;
            align-content: center;
            padding-top: 20%;
        }

        a{
            border: 5px solid #2d3b55;
            border-radius: 4px;
            font-size: 30px;
            padding: 20px;
            width: 13%;
            text-align: center;
            text-decoration: none;
            letter-spacing: .2px;
            color: #222;
        }
    </style>
</head>
<body>
    <div class="links">
        <a href="../controller/logout.php">Log Out</a>

        <a style="margin-left: 75px;" href="index.php" >Go Home</a>

       
    </div>
</body>
</html>

<?php
}
}
?>