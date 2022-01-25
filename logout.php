<?php
    session_start();
    unset($_SESSION["user_id"]);
    unset($_SESSION["nama"]);
    header("Location:login.php");
?>