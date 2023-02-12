<?php
// include '../models/Product.php';
include_once '../database/databaseConnection.php';

$connection;
$conn = new DBConnection;
$connection = $conn->startConnection();

$statusMsg = '';

$targetDir = "../img/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

	$name = $_POST['emri'];
    $time = date('Y-m-d H:i:s');
    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $conn = new PDO("mysql:host=localhost;dbname=recipes", "root", "");

            $statement = $conn->prepare("INSERT INTO images (file_name, uploaded_on, uploaded_by) VALUES (:fileName, :time, :name)");

            $statement->bindParam(':fileName', $fileName);
            $statement->bindParam(':name', $name);
            $statement->bindParam(':time', $time);
            $statement->execute();

            echo 'File uploaded successfully.';

            if($statement){
		        header("Location: ../view/imageDashboard.php");
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

echo $statusMsg;
?>

