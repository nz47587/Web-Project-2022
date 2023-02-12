<?php
    include_once '../repository/productRepository.php';
    include_once '../models/product.php';


    if(isset($_POST['submit'])){
        if(empty($_POST['src'] || empty($_POST['name']) || empty($_POST['description']) || empty($_POST['uploaded_by']))){
            echo "Please fill in all fields!";
        }else{
            $src = $_POST['src'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $uploaded_by = $_POST['uploaded_by'];
            $id = $name.rand(1,999);
            $uploaded_on = date('Y-m-d H:i:s');

            $product = new Product($id, $src, $name, $description, $uploaded_on, $uploaded_by);
            $productRepository = new ProductRepository();
            $productRepository->insertProduct($product);
        }

    }  
?>