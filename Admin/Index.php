<?php
session_start();
if(!isset($_SESSION['adminID']))
{
    header("location: login.php");
}

?>
<html>
    <head>
        <title>Admin Panel</title>
    </head>
    <body>
        <ul>
            <center><h1>Admin panel</h1></center>
            <li><a href="imageList.php">Controle Images</a></li>
            <li><a href="userlist.php">Controle Users</a></li>
            <li><a href="newUser.php">Create user</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </body>
</html>