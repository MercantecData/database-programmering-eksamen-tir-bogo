
<?php 
session_start();
if(isset($_SESSION["adminID"])) {
	session_unset();
    session_destroy();
}
//Navigate to index nomather what
header("Location: index.php");