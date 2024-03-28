<?php
$bdd = new PDO('mysql:host = localhost;dbname=ge_ma_premiere','root','');
session_start();
if (isset( $_SESSION['id'])) {
$approvisions = $bdd-> query('select * from approvision');
$matieres = $bdd-> query('select * from matiere');
$fournisseurs = $bdd-> query('select * from fournisseur');
$msg ='';
if(isset($_GET['msg'])){
      if($_GET['msg']==1){

       $msg =' <div class="alert alert-warning" style="color:blue;
       font-family:times new roman;font-weight:600;text-align:center;">Veuillez bien remplir les champs !</div>';
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
    <title>Matiere || Premiere</title>
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
            <!-- insertion approvision -->
        <div class="listed">
          <div class="container">
             <div class="ajout">
               <h2>Insertion Approvision</h2>
               <a href="liste_approvision.php" class="btnn">Retour <i class="fa fa-arrow-right"></i></a>
            </div>
            <?php
            echo $msg;
            ?>
          <form action="insert_approvision.php" method="post">
            <div class="form-group">
                     <label for="">Matiere</label>
                     <select name="matier" class="form-control">
                     <?php 
                     while($matiere= $matieres->fetch()){
                         echo '<option value="'.$matiere['Id_Mp'].'">'.$matiere['Nom_Mp'].'</option>';

                     }
                     ?>
                     
                     </select>
          </div> 
          <div class="form-group">
                     <label for="">Founisseur</label>
                     <select name="fourniss" class="form-control">
                     <?php 
                     while($fournisseur= $fournisseurs->fetch()){
                         echo '<option value="'.$fournisseur['Id_fourni'].'">'.$fournisseur['Nom_fourni'].'</option>';

                     }
                     ?>
                     
                     </select>
          </div> 
          <div class="form-group">
              <label for="">Quantité d' approvision</label>
              <input type="text" name="quantit" class="form-control">
          </div>
          <div class="form-group">
              <label for="">Unité de mesure</label>
              <input type="text" name="unit" class="form-control">
          </div>
          <div class="form-group">
              <label for="">Date d'approvision</label>
              <input type="date" name="daty" class="form-control">
          </div>
          <div class="form-group">
              <label for="">Numero d'approv</label>
              <input type="text" name="num" class="form-control">
          </div>
          <div class="form-group">
              <button class="btn btn-primary" type="submit">Enregistrer</button>
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