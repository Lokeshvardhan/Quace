<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['name']);
unset($_SESSION['email']);

header("location:userlogin.php");
?>
