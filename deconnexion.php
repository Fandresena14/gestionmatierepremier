<?php
session_start();
unset($SESSION['users']);
if(session_destroy()){
     header('location:index.php');
}
?>