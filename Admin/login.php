<title>Admin Page</title>
<?php
require('../connect.php');

if(isset($_POST["username"]) && isset($_POST['password'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT id FROM adminusers WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        session_start();
        $_SESSION["adminID"] = $result->fetch_assoc()["id"];
        header("Location: index.php");
        exit;
    } else {
        echo "<p style='color:red'>Wrong Username/Password</p>";
    }
}
?>

<form action="login.php" method="POST">
    username:<input type="text" name="username">
    password:<input type="password" name="password">
    <input type="hidden" name="strongkey" value="Lzk34yR71?hrIP">
    <input type="submit" name="submit" value="login">
</form>