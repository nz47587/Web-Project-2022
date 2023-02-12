<?php

include_once '../repository/userRepository.php';

$userId = $_GET['id'];

$userRepository = new UserRepository();
$userRepository->deleteUserById($userId);

header("location:dashboard.php");

?>
