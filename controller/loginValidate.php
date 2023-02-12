<?php

    include_once '../repository/userRepository.php';

    
    if(isset($_POST['loginBtn'])){  //kontrollon per vlera jo null
        if(empty($_POST['email'] || empty($_POST['password']))){ //kontrollon a jan te zbrazta
            echo "Please fill in all fields";
        }else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            $i=0;

            $userRepository = new UserRepository();
            $variables = $userRepository->getAllUsers();

            foreach($variables as $user){
                $i++;
                if($email == $user['Email'] && $password == $user['Password']){
                   session_start();
                   $_SESSION['email'] = $email;
                   $_SESSION['password'] = $password;
                   $_SESSION['role'] = $user['Role'];

                   header("location: ../view/dashboard.php");
                   exit();
                }else{
                    if($i== sizeof($variables)){
                        echo "Email or Password is incorrect";
                        exit();
                    }
                }
            }

            
        }
    }
?>