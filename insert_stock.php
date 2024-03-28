<?php
$bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
if( !empty($_POST['mat'])
and !empty($_POST['emplace'])
and !empty($_POST['quant'])
and !empty($_POST['unitem'])
){
   $bdd->query('insert into stock (Id_Mp,Emplacement,Quantite_stocke,Unite_Mesure,stat)
   values('.$_POST['mat'].',"'.$_POST['emplace'].'",'.$_POST['quant'].',"'.$_POST['unitem'].'","new")');
   header('location:liste_stock.php');
}else{
    header('location:stock.php?msg=1');
}
?>