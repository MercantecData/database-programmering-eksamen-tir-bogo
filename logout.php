<?php
session_start();
if(isset($_SESSION["userID"])) {
	session_unset();
    session_destroy();
}
//Navigate to index nomather what
header("Location: index.php");