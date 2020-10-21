<?php
 
include('config.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM user WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO user(username,password,namalengkap) VALUES (:username,:password,:name)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password", $password, PDO::PARAM_STR);
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            header("location: ../FrontEnd/Login.html");
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}
 
?>