<?php
$bdd = new PDO ('mysql:host=localhost;dbname=ge_ma_premiere','root','');
if(!empty($_POST['nom'])
and!empty($_POST['ad'])
and !empty($_POST['cont'])
and !empty($_POST['email']) ){
     $bdd->query('insert into fournisseur(Nom_fourni,Adresse,Contact,Email,stat)
     values("'.$_POST['nom'].'","'.$_POST['ad'].'","'.$_POST['cont'].'","'.$_POST['email'].'","new")');
     header('location:liste_fournisseur.php');
}else{
     header('location:fournisseur.php?msg=1');
 }

?>                              