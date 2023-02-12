<?php
include_once '../repository/userRepository.php';

$userId = $_GET['id'];

$userRepository = new UserRepository();

$user = $userRepository->getUserById($userId);

?>

<style>
    *{
        padding: 0;
        margin: 0;
    }
    footer{
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
    @media screen and (max-width: 739px){
    /* Dimentions: Iphone 12 Pro */

    header{
        width: 100%;
        height: 60px;
    }
    h1{
        text-align: center;
        margin-top: 9%;
    }
    form{
        margin-left: 40%;
        margin-top: 3%;
        margin-bottom: 2%;
    }
    input{
        padding: 5px;
        width: 43%;
        height: 6%;
    }
    #save{
        margin-top:20px;
        background: #2d3b55;
        color: #fff;
        border-radius: 4px;
        font-weight: 300;
    }
    }

</style>

<header></header>

<h1>Edit Form:</h1>


<form action="" method="POST">
        <input type="text" name="id" value="<?=$user['Id']?>" readonly> <br><br>
        <input type="text" name="name" placeholder="EDIT NAME" value="<?=$user['Name']?>"> <br><br>
        <input type="text" name="surname" placeholder="SURNAME" value="<?=$user['Surname']?>"> <br><br>
        <input type="text" name="username" placeholder="USERNAME" value="<?=$user['Username']?>"> <br><br>
        <input type="text" name="email" placeholder="EMAIL" value="<?=$user['Email']?>"> <br><br>
        <input type="text" name="password" placeholder="PASSWORD" value="<?=$user['Password']?>"> <br><br>
      

        <input id="save" type="submit" name="save" value="SAVE"> <br><br>
</form>


<?php
if(isset($_POST['save'])){
    $id = $userId;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepository->updateUser($id,$name,$surname,$username,$email,$password);
    header("location:dashboard.php");
}

?>

<footer></footer>

