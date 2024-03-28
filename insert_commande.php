<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
if( !empty($_POST['mat'])
and !empty($_POST['quantico'])
and !empty($_POST['unite'])
and !empty($_POST['dateco'])
and !empty($_POST['statut'])
){
   $bdd->query('insert into commande (Id_Mp,Quantite_cmd,unite_msr,Date_cmd,Statut,stat)
   values('.$_POST['mat'].','.$_POST['quantico'].',"'.$_POST['unite'].'","'.$_POST['dateco'].'","'.$_POST['statut'].'","new")');
   header('location:liste_commande.php');
}else{
    header('location:commande.php?msg=1');
}
?>