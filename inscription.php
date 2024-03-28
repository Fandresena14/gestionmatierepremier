<?php
  session_start();
  if (isset( $_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <title>Sign Up</title>
</head>
<body>
  <?php
   $msg ='';
   if(isset($_GET['msg'])){
         if($_GET['msg']==1){

          $msg =' <div class="alert alert-warning" style="color:red;font-family:times new roman;font-weight:600;">Veuillez bien remplir les champs !</div>';
         }
         else {
          $msg =' <div class="alert alert-danger" style="color:green;font-family:times new roman;font-weight:600;">Votre Compte a été bien créé!</div>';
         }
   }
  
  
  
  ?>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="registre.php" class="sign-in-form" method="post">
          <h2  class="title">Création de Compte</h2>
          <?php
            echo $msg;
          ?>
          <div class="input-field">
           <i class="fa fa-user"></i>
           <input type="text" name="pseudo" placeholder="Pseudo">
          </div>
          <div class="input-field">
           <i class="fa fa-envelope"></i>
           <input type="email" name="mail" placeholder="Email">
          </div>
          <div class="input-field">
           <i class="fa fa-lock"></i>
           <input type="password" name="mdp" placeholder="Mot de Passe">
          </div>
          <input type="submit" class="btn solid" value="Créer">
          <p class="inscrip_page"><a href="home.php">Retour</a></p>
        </form>
      </div>
  </div>
</body>
</html>
<?php
    }
?>