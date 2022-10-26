<?php
session_start();

if(isset($_SESSION['auth'])) {
    unset($_SESSION['login']);
    unset($_SESSION['auth']);
}
header("location: ../index.php");
