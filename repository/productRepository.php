<?php

include '../database/databaseConnection.php';

class ProductRepository{
    private $connection;

    function __construct(){
        $conn = new DBConnection;
        $this->connection = $conn->startConnection();
    }

    function insertImage($image){
        $conn = $this->connection;

        $file_name = $image->getFile_Name();
        $uploaded_on = $image->getUploaded_On();
        $uploaded_by = $image->getUploaded_By();

        $sql = "INSERT INTO image (file_name, uploaded_on, uploaded_by) VALUES ($file_name, $uploaded_on, $uploaded_by)";

        $statement = $conn->prepare($sql);
        $statement->execute([$file_name, $uploaded_on, $uploaded_by]);
        echo "<script> alert('Image has been added successfuly!')</script>";
    }

    function getImageById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM images WHERE id='$id'";
        $statement = $conn->query($sql);
        $images = $statement->fetch();

        return $images;
    }

    function getAllImages(){
        $conn = $this->connection;

        $sql = "SELECT * FROM images";
        $statement = $conn->query($sql);
        $images = $statement->fetchAll();

        return $images;
    }

    function editImage($id, $file_name, $uploaded_on, $uploaded_by){
        $conn = $this->connection;
        
        $sql = "UPDATE images SET file_name=?, uploaded_on=?, uploaded_by=? WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$file_name, $uploaded_on, $uploaded_by, $id]);
        echo "<script> alert('Image has been updated successfuly!') </script>";
    }

    function deleteImageById($id){
        $conn = $this->connection;
    
        $sql = "DELETE FROM images WHERE id=?";
    
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('Image has been deleted successfully!') </script>";
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    function insertProduct($product){
        $conn = $this->connection;

        $id = $product->getId();
        $src = $product->getSrc();
        $name = $product->getName();
        $description = $product->getDescription();
        $uploaded_on = $product->getUploaded_On();
        $uploaded_by = $product->getUploaded_By();

        $sql = "INSERT INTO product (src, name, description, uploaded_on, uploaded_by) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$src, $name, $description, $uploaded_on, $uploaded_by]);
        echo "<script> alert('Product has been added successfuly!')</script>";

        header("location: ../view/productDashboard.php");
    }

    function getProductById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM product WHERE Id = '$id'";

        $statement = $conn->query($sql);
        $products = $statement->fetch();

        return $products;
    }

    function getAllProducts(){
        $conn = $this->connection;
        
        $sql = "SELECT * FROM product";

        $statement = $conn->query($sql);
        $products = $statement->fetchAll();

        return $products;
    }

    function updateProduct($id, $src, $name, $description, $uploaded_on, $uploaded_by){
        $conn = $this->connection;

        $sql = "UPDATE product SET src=?, name=?, description=?, uploaded_on=?, uploaded_by=? WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$src, $name, $description, $uploaded_on, $uploaded_by, $id]);
        echo "<script> alert('Product has been updated successfuly!') </script>";
    }

    function deleteProductById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM product WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        
        echo "<script> alert('Product has been deleted successfuly!') </script>";
    }

}


?>
