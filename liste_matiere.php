<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
session_start();
if (isset( $_SESSION['id'])) {
$matieres = $bdd->query('select * from matiere m join fournisseur f on m.Id_fourni=f.Id_fourni');
if (isset($_GET['s']) and !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $matieres = $bdd->query('SELECT * from matiere m join fournisseur f on m.Id_fourni=f.Id_fourni where Nom_Mp
 LIKE "%'.$recherche.'%" ');
}
  $msg = '';
  if(isset($_GET['msg'])){
     $msg = '<div style="color:green;font-weight:700; text-align:center;">Suppression reussi !</div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Liste || matiere</title>
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
                        <span class="title">Tableau de Bord</span>
                    </a>
                </li>
                <li>
                    <a href="liste_matiere.php">
                        <span class="icon"><img src="Images/epices.png" alt="" style="width: 30px;"></span>
                        <span class="title">Matieres Premières <i class="fa fa-arrow-right"></i></span>
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
                <div class="searchin">
                    <form method="GET">
                        <input type="text" name="s" placeholder="search Here">
                        <button  type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!--  userIng-->
                <div class="user">
                    <img src="Images/person.png" alt="">
                </div>
            </div>
             <!-- liste matiere -->
         <div class="listed">
         <div class="container">
              <?php
               echo $msg; 
              ?>
            <div class="ajout">
               <h2>Liste Matieres Premières</h2>
               <a href="matiere.php" class="btnn"> <i class="fa fa-plus"></i>Ajouter</a>
            </div>
            <table class="table table-bordered  table-hover " >
               <thead>
                 <tr>
                 <th>ID</th>
                 <th>Matiere premiere</th>
                 <th>Fournisseur</th>
                 <th>Description</th>
                 <th>Quantite de matière première</th>
                 <th>Unité de mesure</th>
                 <th>Prix Unitaire</th>
                 <th>Date d'expiration</th>
                 <th>Action</th>
                 <tbody>
                </tr>
              </thead>
              <tbody>
                   <?php
                    while($matiere = $matieres->fetch()){
                        echo'<tr>
                                <td>'.$matiere['Id_Mp'].'</td>
                                <td>'.$matiere['Nom_Mp'].'</td>
                                <td>'.$matiere['Nom_fourni'].'</td>
                                <td>'.$matiere['Description'].'</td>
                                <td>'.$matiere['Quantite_Mp'].'</td>
                                <td>'.$matiere['Unite_mesure'].'</td>
                                <td>'.$matiere['Prix_unitaire'].'<span>$</span></td>
                                <td>'.$matiere['Date_expiration'].'</td>
                                <td><a href="suppr_matiere.php?id='.$matiere['Id_Mp'].'&id2='.$matiere['Id_fourni'].'" style ="margin-right:15px;"><i class="fa fa-trash" style ="color:#222;"></i></a>
                                    <a href="menu_matiere.php?id='.$matiere['Id_Mp'].'&id2='.$matiere['Id_fourni'].'" style ="margin-left:-10px;" > <i ></i></a> 
                                    <a href="modif_matiere.php?id='.$matiere['Id_Mp'].'&id2='.$matiere['Id_fourni'].'" style ="margin-left:5px;"><i class="fa fa-edit" style ="color: #222;"></i> </a> 
                                </td>
                                 
                              </tr>';
                          }
             
                   ?>
             </tbody>
            </table>          
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