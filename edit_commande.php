<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
if( !empty($_POST['quantité'])
and !empty($_POST['daty'])
and !empty($_POST['stat'])){
     $bdd->query('update commande set Quantite_cmd='.$_POST['quantité'].',Date_cmd="'.$_POST['daty'].'",
     Statut="'.$_POST['stat'].'" where Id_Mp='.$_POST['mat']);

header('location:liste_commande.php');

}else{
     echo'invalide';
}
?>