<?php

include_once '../repository/productRepository.php';

$id = $_GET['id'];

$productRepository = new ProductRepository();
$productRepository->deleteProductById($id);

header("location: productDashboard.php");


?>