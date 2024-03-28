<?php   
  $bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
  session_start();
if (isset( $_SESSION['id'])) {
  $fournisseurs=$bdd->query('select* from fournisseur where Id_fourni='.$_GET['id']);
  $fourni=$fournisseurs->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Modif||matiere</title>
</head>
<body>
<div class="container1">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="Images/bongou-1.png" alt="" style="width:100px;margin-top:9px;"></span>
                        <span class="title">GE-MATIERE1ERE</span>
                    </a>
                </li>
                <li>
                    <a href="home.php">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="title">Tableau de Bord</i></span>
                    </a>
                </li>
                <li>
                    <a href="liste_matiere.php">
                        <span class="icon"><img src="Images/epices.png" alt="" style="width: 30px;"></span>
                        <span class="title">Matieres Premières</span>
                    </a>
                </li>
                <li>
                    <a href="liste_fournisseur.php">
                        <span class="icon"><img src="Images/fournisseur.png" alt="" style="width: 30px;"></span>
                        <span class="title">Fournisseurs</span>
                    </a>
                </li>
                <li>
                    <a href="liste_commande.php">
                        <span class="icon"><img src="Images/cmd.png" alt="" style="width: 30px;"></span>
                        <span class="title">Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="liste_stock.php">
                        <span class="icon"><img src="Images/boxes.png" alt="" style="width: 30px;"></span>
                        <span class="title">Stocks</span>
                    </a>
                </li>
                <li>
                    <a href="liste_approvision.php">
                        <span class="icon"><img src="Images/approv.png" alt="" style="width:30px;"></span>
                        <span class="title">Approvisions</span>
                    </a>
                </li>
                <li>
                    <a href="deconnexion.php">
                        <span class="icon"><i class="fa fa-arrow-left"></i></span>
                        <span class="title">Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa fa-list"></i>
                </div>
                <!-- search -->
                <!-- 
                  <div class="search">
                    <label for="">
                        <input type="text" placeholder="search Here">
                        <i class="fa fa-search"></i>
                    </label>
                </div>
                 -->
                <!--  userIng-->
                <div class="user">
                    <img src="Images/person.png" alt="">
                </div>
            </div>
            <!-- modification fournisseur -->
    <div class="listed">
        <div class="container">
           <div class="ajout">
               <h2>Modification fournisseur</h2>
               <a href="liste_fournisseur.php" class="btnn">Retour <i class="fa fa-arrow-right"></i></a>
            </div>
        <form action="edit_fournisseur.php" method="post">
        <div class="form-group">
          <label for="">Nom de la fournisseur</label>
          <input type="text"name="noms" value="<?php  echo $fourni['Nom_fourni']?>" class="form-control">
          <input type="hidden" name="id" value="<?php  echo $fourni['Id_fourni']?>">
       </div>
       <div class="form-group">
          <label for="">Adresse</label>
          <input type="text"name="ads" value="<?php  echo $fourni['Adresse']?>" class="form-control">
       </div>
       <div class="form-group">
          <label for="">Contact</label>
          <input type="text"name="conts" value="<?php  echo $fourni['Contact']?>" class="form-control">
       </div>
       <div class="form-group">
          <label for="">E-mail</label>
          <input type="text"name="emails" value="<?php  echo $fourni['Email']?>" class="form-control">
       </div>
       <div class="form-group">
          <button class="btn btn-primary" type="submit">Modifier</button>
       </div>
     </form>

</div> 
            </div>
        </div>
        
    </div>
    <script>
        // MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        // add hovered i selected list item
        let list = document.querySelectorAll('.navigation li ');
        function activeLink(){
            list.forEach((item) =>
           item.classList.remove('hovered'));
           this.classList .add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
    </script>
</body>
</html>
<?php
    }
?>