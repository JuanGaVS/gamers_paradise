<?php
if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
}

if (!isset($_SESSION)) { session_start(); }
 unset($_SESSION);
 session_destroy();

 header('Location: login.php');

?>
