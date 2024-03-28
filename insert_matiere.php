<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
if(!empty($_POST['nom'])
and!empty($_POST['fourni'])
and!empty($_POST['descri'])
and!empty($_POST['quantite'])
and!empty($_POST['unite'])
and!empty($_POST['prix'])
and!empty($_POST['date'])){
    $bdd->query ('insert into matiere(Nom_Mp,Id_fourni,Description,Quantite_Mp,Unite_mesure,
    Prix_unitaire,Date_expiration,statute)
    values("'.$_POST['nom'].'",'.$_POST['fourni'].',"'.$_POST['descri'].'",
    '.$_POST['quantite'].',"'.$_POST['unite'].'",'.$_POST['prix'].',"'.$_POST['date'].'","new")');
    header('location:liste_matiere.php');
}else{
    header('location:matiere.php?msg=1');
}

?>