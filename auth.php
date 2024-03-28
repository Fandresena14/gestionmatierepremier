<?php
$base = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');

if(!empty($_POST['pseudo']) and !empty($_POST['mdp']) ){

   $users = $base->query('select * from users where pseudo="'.$_POST['pseudo'].'" and password="'.$_POST['mdp'].'"');
  
  
    if($users->rowcount()>0){
      
    session_start();
    $user = $users->fetch();
      
     $_SESSION['id']=$user['id_user'];
     header('location:home.php');

        }
   else{
                    header('location:index.php?msg=2');


                }
            }
else{
    header('location:index.php?msg=1');
}






?>