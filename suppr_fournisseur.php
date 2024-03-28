<?php
$bdd= new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
$bdd->query('delete from fournisseur where Id_fourni='.$_GET['id']);
header( 'location:liste_fournisseur.php?msg=2');
?>