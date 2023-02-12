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
            background-color: lightgrey; 
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
            background: #f2f2f2; 
        }
        main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table{
            width: 50%;
            border: 3px solid #2d3b55;
            margin-top: 70px;
        }
        table th, td{
            border: 1.9px solid #2d3b55;
            padding: 15px;
        }

        footer{
            height: 50px;
            width: 100%;
            background-color: lightgrey;
        }
        .insert{
           margin-top: 9%;
        }
        .submit{
            color:#fff; 
            background: #2d3b55; 
            padding: 7px; 
            font-weight: 300; 
            border: none;
            border-radius: 2.6px;
        }
        @media only screen and (max-width: 739px) {
            body{
                height: 100%;
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
            footer {
                height: 40px;
                margin-top: 158%;
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
                    <th>File Name</th>
                    <th>Uploaded On</th>
                    <th>Uploaded By</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
    
            <?php
            include_once '../repository/productRepository.php';
            $productRepository = new ProductRepository();
            $images = $productRepository->getAllImages();
            
            foreach($images as $img){
                echo
                "
                <tbody>
                    <tr>
                        <td>$img[Id]</td>
                        <td>$img[file_name]</td>
                        <td>$img[uploaded_on]</td>
                        <td>$img[uploaded_by]</td>
                        <td><a href='editImage.php?id=$img[Id]'>Edit</a></td>
                        <td><a href='deleteImage.php?id=$img[Id]'>Delete</a></td>
                    </tr>
                </tbody>
                ";
            }
            
            ?>

        </table>

        

        <div class="insert">
            <h1>Insert Images Here:</h1>
            <br><br>
            
            <form action="../controller/insertImages.php" name="myForm" method="post" enctype="multipart/form-data">
                <input id="emri" name="emri" type="text" placeholder="Name" style="color: black; height: 25px; width: 305px;">
                <br>
                <!-- <textarea name="description" rows="4" cols="50">Recipe...</textarea><br> -->
                <br>
                <input type="file" name="file" style="font-weight: bold;">
                <input type="submit" name="submit" value="Upload" style="color:black; padding: 2px; font-weight: 300;">

            </form>
        </div>


    </main>

    <br><br><br><br><br><br><br><br>

    <footer></footer>

</body>
</html>

<?php
    }
}
?>