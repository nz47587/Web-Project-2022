<?php

include_once '../repository/productRepository.php';

$Id = $_GET['id'];

$productRepository = new ProductRepository();
$productRepository->deleteImageById($Id);


header("location: imageDashboard.php");

?>