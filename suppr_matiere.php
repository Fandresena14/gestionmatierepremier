<?php
$bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
$bdd->query('delete from matiere where Id_Mp='.$_GET['id'].' and Id_fourni='.$_GET['id2']);
header( 'location:liste_matiere.php?msg=2');
?>