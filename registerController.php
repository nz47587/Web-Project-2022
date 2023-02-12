<?php
    include_once '../repository/userRepository.php';
    include_once '../models/user.php';


    if(isset($_POST['registerBtn'])){
        if(empty($_POST['name'] || empty($_POST['surname']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']))){
            echo "Please fill in all fields!";
        }else{
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $id = $username.rand(1,999);
            $role=0;

            $user = new User($id, $name, $surname, $username, $email, $password, $role);
            $userRepository = new UserRepository();
            $userRepository->insertUser($user);
        }

    }  
?>