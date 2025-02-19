<?php
    include "connection_configuration.php";
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php?mes=error');
?>