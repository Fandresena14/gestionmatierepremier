<?php
$bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
session_start();
if (isset( $_SESSION['id'])) {
  $commandes = $bdd->query('select * from commande c join matiere m on c.Id_Mp=m.Id_Mp');
  if (isset($_GET['s']) and !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $commandes = $bdd->query('SELECT * from commande c join matiere m on c.Id_Mp=m.Id_Mp where Nom_Mp OR Statut LIKE "%'.$recherche.'%" ');
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
    <title>Liste || Commande</title>
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
                        <span class="title">Commandes <i class="fa fa-arrow-right"></i></span>
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
            <!-- liste commande -->
            <div class="listed">
            <div class="container">
        <?php
           echo $msg; 
        ?>
         <div class="ajout">
               <h2>Liste commande</h2>
               <a href="commande.php" class="btnn"> <i class="fa fa-plus"></i>Ajouter</a>
         </div>
         <table class="table table-bordered  table-hover " >
              <thead>
                <tr>
                 <th>ID</th>
                 <th>Matiere premiere</th>
                 <th>Quantité Commandé </th>
                 <th>Unité de mesure </th>
                 <th>Date de Commande</th>
                 <th>Statut de la commande</th>
                 <th>Action</th>
                 <tbody>
                </tr>
              </thead>
                   <?php
                    while($commande = $commandes->fetch()){
                        echo'<tr>
                                <td>'.$commande ['Id_cmd'].'</td>
                                <td>'.$commande ['Nom_Mp'].'</td>
                                <td>'.$commande ['Quantite_cmd'].'</td>
                                <td>'.$commande ['unite_msr'].'</td>
                                <td>'.$commande ['Date_cmd'].'</td>
                                <td>'.$commande ['Statut'].'</td>
                                <td><a href="suppr_commande.php?id='.$commande['Id_cmd'].'&id2='.$commande['Id_Mp'].'" style ="margin-right:15px;"><i class="fa fa-trash" style =" color: #222;"></i></a>
                                    <a href="menu_commande.php?id='.$commande['Id_cmd'].'&id2='.$commande['Id_Mp'].'" style ="margin-left:-10px;" > <i ></i></a> 
                                    <a href="modif_commande.php?id='.$commande['Id_cmd'].'&id2='.$commande['Id_Mp'].'" style ="margin-left:5px;"><i class="fa fa-edit" style =" color: #222;"></i> </a> 
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