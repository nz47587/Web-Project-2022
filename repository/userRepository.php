<?php 

include '../database/databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DBConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $id = $user->getId();
        $name = $user->getName();
        $surname = $user->getSurname();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $role = $user->getRole();

        $sql = "INSERT INTO user (id,name, surname, username, email,password,role) VALUES (?,?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name,$surname,$username,$email,$password,$role]);
        echo "<script> alert('User has been added successfuly!') </script>";
    }


    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user";
        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id){
      $conn = $this->connection;

      $sql = "SELECT * FROM user WHERE id='$id'";
      $statement=$conn->query($sql);
      $user = $statement->fetch();

      return $user;
    }    

    function updateUser($id,$name,$surname,$username,$email,$password){
        $conn = $this->connection;

        $sql = "UPDATE user SET name=?,surname=?,username=?,email=?,password=? where id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$name,$surname,$username,$email,$password,$id]);
        echo "<script> alert('User has been updated successfuly!') </script>";
    }

    function deleteUserById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE id=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('User has been deleted successfuly!') </script>";
    }
}

?>