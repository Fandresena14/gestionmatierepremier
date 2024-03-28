<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
if( !empty($_POST['emplaces'])
and !empty($_POST['quants'])){
     $bdd->query('update stock set Emplacement="'.$_POST['emplaces'].'",Quantite_stocke='.$_POST['quants'].',
     Unite_Mesure="'.$_POST['unite'].'" where Id_Mp='.$_POST['mats']);

header('location:liste_stock.php');

}else{
     echo'invalide';
}
?>