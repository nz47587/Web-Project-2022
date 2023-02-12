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
            /* color: aliceblue; */
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
            background: #f2f2f2; /*#797999*/ */
        }
        main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table{
            border: 3px solid #2d3b55;
            margin-top: 70px;
            width: 90%;
        }
        table th, td{
            border: 1.9px solid #2d3b55;
            padding: 5px;
            /* text-align:center; */
            overflow: hidden;
        }

        footer{
            height: 50px;
            width: 100%;
            background-color: lightgrey;
            margin-top: 14.8%;
        }
        h1{
            margin-left: 9px;
        }
        .insert{
           margin-top: 9%;
           margin-left: 6%;
        }
        input, textarea{
            outline: none;
            border: transparent;
            border-bottom: 1px solid #747474;
            transition: all .2s;
            padding: 15px;
            width: 90%;
            height: 6%;
        }
        textarea{
            width: 90%;
        }
        #who{
            margin-left: 55px;
            margin-bottom: 60px;
        }
        .submit{
            color:#fff; 
            background: #2d3b55; 
            padding: 7px; 
            font-weight: 300; 
            border: none;
            border-radius: 2.6px;
            margin-left: 24%;
            width: 40%;
        }

        @media only screen and (max-width: 739px) {
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
                margin-top: 20px;
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
                    <th>Src</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Uploaded_On</th>
                    <th>Uploaded_By</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
    
            <?php
            include_once '../repository/productRepository.php';
            $productRepository = new ProductRepository();
            $products = $productRepository->getAllproducts();
            
            foreach($products as $product){
                echo
                "
                <tbody>
                    <tr>
                        <td>$product[Id]</td>
                        <td>$product[Src]</td>
                        <td>$product[Name]</td>
                        <td>$product[Description]</td>
                        <td>$product[Uploaded_On]</td>
                        <td>$product[Uploaded_By]</td>
                        <td><a href='editProduct.php?id=$product[Id]'>Edit</a></td>
                        <td><a href='deleteProduct.php?id=$product[Id]'>Delete</a></td>
                    </tr>
                </tbody>
                ";
            }
            ?>
        </table>

        <div class="insert">
            <h1>Insert Products Here:</h1>
            <br><br>
            
            <form action="../controller/productController.php" name="myForm" method="post">
                <input id="src" name="src" type="text" placeholder="../img/example.jpg" > <br><br>
                <input id="name" name="name" type="text" placeholder="Enter Product Name" ><br><br>
                <br>
                <textarea name="description" rows="20" cols="90" placeholder="Enter Recipe"></textarea><br>
                <br>
                <input type="text" name="uploaded_by" placeholder="Uploaded By"><br><br><br><br>
                <input type="submit" class="submit" name="submit" value="Upload" >

            </form>
        </div>
    </main>

    <footer></footer>

</body>
</html>

<?php
    }
}
?>