<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
$matieres = $bdd-> query('select * from matiere ');
$stockk = $bdd->query('select * from stock s join matiere m on s.Id_Mp=m.Id_Mp where s.Id_Stock='.$_GET['id'].' 
and s.Id_Mp='.$_GET['id2']);
$stoc = $stockk->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <title> Modif||Stock</title>
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
                        <span class="title">Matieres  Premières</span>
                    </a>
                </li>
                <li>
                    <a href="liste_fournisseur.php">
                        <span class="icon"><img src="Images/fournisseur.png" alt="" style="width: 30px;"></span>
                        <span class="title">Fournisseurs </span>
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
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="search Here">
                        <i class="fa fa-search"></i>
                    </label>
                </div>
                <!--  userIng-->
                <div class="user">
                    <img src="Images/person.png" alt="">
                </div>
            </div>
            <!-- Modification stock -->
      <div class="listed">
         <div class="container">
            <div class="ajout">
               <h2>Modification stock</h2>
               <a href="liste_stock.php" class="btnn">Retour <i class="fa fa-arrow-right"></i></a>
            </div>
           <form action="edit_stock.php" method="post">
           <div class="form-group">
               <label for="">Matiere</label>
               <?php echo '<input class="form-control" type="text" name="mats" value="'.$_GET['id2'].'">';?>  
               <?php echo '<input class="form-control" disabled type="text" style="margin-top:2rem;" value="'.$stoc['Nom_Mp'].'">';?>
                         
                     
          </div>
          <div class="form-group">
              <label for="">Emplacement de Stockage</label>
              <input type="text" name="emplaces" value="<?php  echo $stoc['Emplacement']?>" class="form-control" class="form-control">
          </div>
          <div class="form-group">
              <label for="">Quantité Stocké</label>
              <input type="text" name="quants" value="<?php  echo $stoc['Quantite_stocke']?>" class="form-control" class="form-control">
          </div>
          <div class="form-group">
              <label for="">Unité de mesure</label>
              <input type="text" name="unite" value="<?php  echo $stoc['Unite_Mesure']?>" class="form-control" class="form-control">
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