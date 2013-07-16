<?php
    session_start();
    require_once("../includes/initialize.php");
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
        session_destroy();
    }
    redirect_to("login.php");
    p
    
?>