<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
if( !empty($_POST['matier'])
and !empty($_POST['fourniss'])
and !empty($_POST['quantit'])
and !empty($_POST['unit'])
and !empty($_POST['daty'])
and !empty($_POST['num'])){
    $bdd->query('INSERT into approvision(Id_Mp,Id_fourni,Quantite_approv,Unite_mesure,Date_approv,Numero_approv)
    values('.$_POST['matier'].','.$_POST['fourniss'].','.$_POST['quantit'].',"'.$_POST['unit'].'","'.$_POST['daty'].'",'.$_POST['num'].')');
      header('location:liste_approvision.php');

}else{
    header('location:approvision.php?msg=1');
}
?>