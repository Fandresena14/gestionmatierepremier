<?php
$base = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');

if(!empty($_POST['pseudo']) and !empty($_POST['mail']) 
and !empty($_POST['mdp']) ){

    $base->query('insert into users(pseudo,email,password)
    values("'.$_POST['pseudo'].'",
    "'.$_POST['mail'].'",
    "'.$_POST['mdp'].'")');
    header('location:inscription.php?msg=2');


}
else{
    header('location:inscription.php?msg=1');
}






?>