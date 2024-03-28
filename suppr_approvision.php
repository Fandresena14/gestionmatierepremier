<?php
$bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
$bdd->query('delete from approvision where Id_approv='.$_GET['id'].' and Id_Mp='.$_GET['id2'].' 
and Id_fourni='.$_GET['id3']);
header( 'location:liste_approvision.php?msg=2');
?>