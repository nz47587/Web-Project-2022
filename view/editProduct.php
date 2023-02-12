<?php

include_once '../repository/productRepository.php';

$Id = $_GET['id'];

$productRepository = new ProductRepository();
$product = $productRepository->getProductById($Id); 

?>

<style>
    *{
        padding: 0;
        margin: 0;
    }
    footer{
        margin-top: 12.2%;
        height: 50px;
        width: 100%;
        background-color:#f2f2f2;
    }
    header{
        width: 100%;
        height: 50px;
        background-color:#f2f2f2; /*#f2f2f2 */
        background-size: 100%;
        display: flex;
        justify-content: flex-end;
        font-family: 'Rubik', sans-serif;
    }

    input:focus{
        border-color: #222;
    }

    h1{
        margin-left: 3px;
    }
    .insert{
        margin-top: 5%;
        margin-left: 36%;
        width: 60%;
    }
    input, textarea{
        outline: none;
        border: transparent;
        border-bottom: 1px solid #747474;
        transition: all .2s;
        padding: 15px;
        width: 50%;
        height: 6%;
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
        /* margin-left: 24%; */
        width: 50%;
    }

</style>

<header></header>

<div class="insert">
    <h1>Edit Products:</h1>

        <br><br>
        
        <form action="" name="myForm" method="post">
            
            <input type="text" name="id" value="<?=$product['Id']?>" readonly><br><br>
            <input id="src" name="src" type="text" placeholder="../img/example.jpg" value="<?=$product['Src']?>"> <br><br>
            <input id="name" name="name" type="text" placeholder="Enter Product Name"  value="<?=$product['Name']?>" ><br><br><br>
            <textarea name="description" rows="50" cols="90" placeholder="Enter Recipe"  value="<?=$product['Description']?>"></textarea><br><br>
            <input type="text" name="uploaded_on" placeholder="Uploaded On"  value="<?=$product['Uploaded_On']?>"><br><br>
            <input type="text" name="uploaded_by" placeholder="Uploaded By"  value="<?=$product['Uploaded_By']?>"><br><br><br><br>
            <input type="submit" class="submit" name="submit" value="Upload">

        </form>
</div>

<footer></footer>

<?php
    if(isset($_POST['submit'])){
        $id = $Id;
        $src = $_POST['src'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $uploaded_by = $_POST['uploaded_by'];
        $uploaded_on = date('Y-m-d H:i:s');

        $productRepository->updateProduct($id, $src, $name, $description, $uploaded_on, $uploaded_by);

        header("location: productDashboard.php");
    }  
?>




