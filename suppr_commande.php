<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
$bdd->query('delete from commande where Id_cmd='.$_GET['id'].' and Id_Mp='.$_GET['id2']);
header( 'location:liste_commande.php?msg=1');
?>