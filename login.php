<?php
include('config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myemail = mysqli_real_escape_string($db,$_POST['email']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT id FROM cred WHERE email = '$myemail' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count > 0) {
        $_SESSION['message'] = $myemail;
        header("location: ./user.php");
    }else {
        $error = "Your Email or Password is incorrect";
        $_SESSION['message'] = $error;
        header("location: ./index.php");
    }
}
?>