<?php
require("../connect.php");
session_start();
if(!isset($_SESSION['adminID']))
{
    header("location: login.php");
}


if($_POST["submit"]){
    $username = $_POST['username'];
    $firstname= $_POST['firstname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if(isset($_POST["admin"])){
        $sql = "INSERT INTO adminusers(username, password, name) VALUES ('$username','$password','$firstname')";
    }
    else {
       $sql = "INSERT INTO users(username, password, name) VALUES ('$username','$password','$firstname')";
    }
    $conn->query($sql);
}



?>
<h1>New user</h1>
<form method="post" action="newUser.php">
    firstname: <input type="text" name="firstname"/><br>
    username: <input type="text" name="username"/><br>
    password: <input type="password" name="password"/><br>
    Give admin permission <input type="checkbox" name="admin"/><br>
    <input type="submit" value="Create" name="submit">
</form>
