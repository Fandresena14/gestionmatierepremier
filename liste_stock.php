<?php
  $bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
  session_start();
if (isset( $_SESSION['id'])) {
  $stocks = $bdd->query('select * from stock s join matiere m on s.Id_Mp=m.Id_Mp');
  if (isset($_GET['s']) and !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $stocks = $bdd->query('SELECT * from stock s join matiere m on s.Id_Mp=m.Id_Mp where Nom_Mp  LIKE "%'.$recherche.'%" ');
}
   $msg = '';
   if(isset($_GET['msg'])){
      $msg = '<div style="color:green;font-weight:700; text-align:center;">Suppression reussi !</div>';
    }
    function verifyQuantity($quantity) {
        if ($quantity < 10) {
            return ' <span style="color:red;margin-left:10px;" class="d-inline-block"> Stock Presque Insuffisant!</span>';

        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Liste || stock</title>
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
                        <span class="title">Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="liste_stock.php">
                        <span class="icon"><img src="Images/boxes.png" alt="" style="width: 30px;"></span>
                        <span class="title">Stocks <i class="fa fa-arrow-right"></i></span>
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
            <!-- liste stock -->
            <div class="listed">
            <div class="container">
        <?php
           echo $msg; 
        ?>
       <div class="ajout">
               <h2>Liste stock</h2>
               <a href="stock.php" class="btnn"> <i class="fa fa-plus"></i>Ajouter</a>
      </div>
        <table class="table table-bordered  table-hover " >
              <thead>
                <tr>
                 <th>ID</th>
                 <th>Matiere premiere</th>
                 <th>Emplacement de Stockage </th>
                 <th>Quantite de Stocké</th>
                 <th>Unité de mesure</th>
                 <th>Action</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                    while($stock = $stocks->fetch()){
                        echo'<tr>
                                <td>'.$stock['Id_stock'].'</td>
                                <td>'.$stock['Nom_Mp'].'</td>
                                <td>'.$stock['Emplacement'].'</td>
                                <td>'.$stock['Quantite_stocke']. " ".verifyQuantity($stock['Quantite_stocke'])." ".'</td>
                                <td>'.$stock['Unite_Mesure'].'</td>
                                <td><a href="suppr_stock.php?id='.$stock['Id_stock'].'&id2='.$stock['Id_Mp'].'" style ="margin-right:15px;"><i class="fa fa-trash" style =" color: #222;"></i></a>
                                    <a href="suppr_stock.php?id='.$stock['Id_stock'].'&id2='.$stock['Id_Mp'].'" style ="margin-left:-10px;" > <i ></i></a> 
                                    <a href="modif_stock.php?id='.$stock['Id_stock'].'&id2='.$stock['Id_Mp'].'" style ="margin-left:5px;"><i class="fa fa-edit" style =" color: #222;"></i> </a> 
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