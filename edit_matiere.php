<?php
$bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
if(!empty($_POST['mats'])
and!empty($_POST['descri'])
and!empty($_POST['quant'])
and!empty($_POST['unit'])
and!empty($_POST['prixs'])
and!empty($_POST['daty'])){
          $bdd->query('UPDATE matiere set Nom_Mp="'.$_POST['mats'].'",Description="'.$_POST['descri'].'",
     Quantite_Mp='.$_POST['quant'].',Unite_mesure="'.$_POST['unit'].'",Prix_unitaire='.$_POST['prixs'].',
Date_expiration="'.$_POST['daty'].'" where Id_Mp='.$_POST[id].' and Id_fourni='.$_POST['four']);
header('location:liste_matiere.php');
}else{
     echo'Invalide';
}
?>