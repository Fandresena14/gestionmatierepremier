<?php
$bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
if( !empty($_POST['noms'])
and !empty($_POST['ads'])
and !empty($_POST['conts'])
and !empty($_POST['emails'])){
     $bdd->query('update fournisseur set Nom_fourni="'.$_POST['noms'].'",Adresse="'.$_POST['ads'].'",
     Contact="'.$_POST['conts'].'",Email="'.$_POST['emails'].'" where Id_fourni='.$_POST['id']);
     header('location:liste_fournisseur.php');
}else{
     echo'Invalide';
}


?>