<?php

include_once '../repository/productRepository.php';

$Id = $_GET['id'];

$productRepository = new ProductRepository();
$image = $productRepository->getImageById($Id); 

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
    h1{
        text-align: center;
        margin-top: 4%;
        font-weight: 300;
    }
    form{
        margin-left: 40%;
        margin-top: 3%;
        margin-bottom: 2%;
    }
    input{
        outline: none;
        border: transparent;
        border-bottom: 1px solid #747474;
        transition: all .2s;
        padding: 5px;
        width: 33%;
        height: 6%;
    }
    input:focus{
        border-color: #222;
    }

    #save{
        margin-top:20px;
        background: #2d3b55;
        color: #fff;
        border-radius: 4px;
        font-weight: 300;
    } 
</style>

<header></header>

<h1>Edit Image:</h1>


<form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value="<?=$image['Id']?>" readonly> <br><br>
        <input type="file" name="file" style="font-weight: bold;"><br><br>
        <input type="text" name="uploaded_on" placeholder="EDIT UPLOAD TIME" value="<?=$image['uploaded_on']?>"> <br><br>
        <input type="text" name="emri" placeholder="UPLOADED BY" value="<?=$image['uploaded_by']?>"> <br><br>

        <input id="save" type="submit" name="submit" value="SAVE" > <br><br>
</form>

<footer></footer>

<?php

include_once '../database/databaseConnection.php';

$connection;
$conn = new DBConnection;
$connection = $conn->startConnection();

$statusMsg = '';

$targetDir = "../img/";


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $file_name = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $file_name;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

	$uploaded_by = $_POST['emri'];
    $uploaded_on = date('Y-m-d H:i:s');
    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $conn = new PDO("mysql:host=localhost;dbname=recipes", "root", "");

            $statement = $conn->prepare('UPDATE images SET file_name = :file_name, uploaded_on = :uploaded_on, uploaded_by = :uploaded_by where Id=:Id');
            $statement->bindParam(':file_name', $file_name);
            $statement->bindParam(':uploaded_on',$uploaded_on);
            $statement->bindParam(':uploaded_by',$uploaded_by);
            $statement->bindParam(':Id',$Id);
            $statement->execute();


            echo 'File updated successfully.';

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



