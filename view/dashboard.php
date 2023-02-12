<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
}else{
    if($_SESSION['role'] != '1'){
        header("location: home.php");
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }

        /* --------------Header--------------- */
    
        header{
            width: 100%;
            height: 70px;
            background-color: lightgrey;  /*#f2f2f2   #a4a4ba   #d0d0db*/ 
            background-size: 100%;
            display: flex;
            justify-content: flex-end;
            font-family: 'Rubik', sans-serif;
        }

        #logo{
            height: 80px;
            padding-right: 55%;
            align-self: center;
        }

        .nav{
            display: flex;
            align-items: center;
        }

        .nav li{
            list-style: none;
            margin-left: 20px;
        }

        .nav a{
            text-decoration: none;
            text-transform: uppercase;
            font-size: 130%;
            color: black;
            font-weight: bold;
        }

        li :last-child{
            margin-right: 20px;
        }

        header a:hover {
            transition: 0.5s;
            color: #219ecb;
        }


        /* --------------Dashboard--------------- */

        body{
            background: #f2f2f2; /*#797999*/ 
        }
        main{
            display: flex;
            justify-content: center;
        }

        table{
            border: 3px solid #2d3b55;
            margin-top: 70px;
        }
        table th, td{
            border: 1.9px solid #2d3b55;
            padding: 15px;
            /* text-align:center; */
        }

        @media only screen and (max-width: 739px) {
            /* Dimentions: Iphone 12 Pro */

            header{
                width: 100%;
                height: 60px;
            }
            #logo {
                height: 66px;
                padding-right: 30%;
            }
            .nav {
                display: none;
            }
            table {
                width: 90%;
                margin-top: 50px;
            }
        }
    </style>
</head>
<body>

    <header>
        <img src="/Web Project/img/logo.png" alt="Logo" id="logo">

        <ul class="nav">
            <li><a href="dashboard.php">Users</a></li>
            <li><a href="imageDashboard.php">Images</a></li>
            <li><a href="productDashboard.php">Products</a></li>
            <li><a href="../controller/logout.php">LogOut</a></li>
        </ul>
    </header>

    

    <main>
        <table border="3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
    
            <?php
            include_once '../repository/userRepository.php';
            $userRepository = new UserRepository();
            $users = $userRepository->getAllUsers();
            
            foreach($users as $user){
                echo
                "
                <tbody>
                    <tr>
                        <td>$user[Id]</td>
                        <td>$user[Name]</td>
                        <td>$user[Surname]</td>
                        <td>$user[Username]</td>
                        <td>$user[Email]</td>
                        <td>$user[Password]</td>
                        <td>$user[Role]</td>
                        <td><a href='edit.php?id=$user[Id]'>Edit</a></td>
                        <td><a href='delete.php?id=$user[Id]'>Delete</a></td>
                    </tr>
                </tbody>
                ";
            }
            
            ?>

        </table>

    </main>


</body>
</html>

<?php
    }
}
?>