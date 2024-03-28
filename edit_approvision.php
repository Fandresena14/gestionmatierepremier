<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
if( !empty($_POST['quantity'])
and !empty($_POST['unit'])
and !empty($_POST['daté'])
and !empty($_POST['numap'])){
     $bdd->query('update approvision set Quantite_approv='.$_POST['quantity'].',Unite_mesure="'.$_POST['unit'].'",Date_approv="'.$_POST['daté'].'",
     Numero_approv='.$_POST['numap'].' where Id_Mp='.$_POST['mat'].' and Id_fourni='.$_POST['fournis']);

header('location:liste_approvision.php');

}else{
     echo'invalide';
}
?>