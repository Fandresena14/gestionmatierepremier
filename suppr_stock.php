<?php
$bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
$bdd->query('delete from stock where Id_Stock='.$_GET['id'].' and Id_Mp='.$_GET['id2']);
header( 'location:liste_stock.php?msg=2');
?>