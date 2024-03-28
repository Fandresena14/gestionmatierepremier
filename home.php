<?php
    $bdd = new PDO('mysql:host=localhost;dbname=ge_ma_premiere','root','');
     session_start();
     if (isset( $_SESSION['id'])) {
    $matieres = $bdd->query('select * from matiere m join fournisseur f on m.Id_fourni=f.Id_fourni');
    $fournisseurs = $bdd->query('select * from fournisseur');
    // notification matiere
    $counts = $bdd->query('select count(*)compt from matiere where statute="new"');
    $count = $counts->fetch();
    if ($count['compt']<1) {
         $notifi = '';
    }else{
         $notifi ='<p>'.$count['compt'].'</p>';
    }
    // notif fournisseur
    $counts = $bdd->query('select count(*)compt from fournisseur where stat="new"');
    $count = $counts->fetch();
    if ($count['compt']<1) {
         $notific = '';
    }else{
         $notific ='<p>'.$count['compt'].'</p>';
    }
    // notif commande
    $counts = $bdd->query('select count(*)compt from commande where stat="new"');
    $count = $counts->fetch();
    if ($count['compt']<1) {
         $notifica = '';
    }else{
         $notifica ='<p>'.$count['compt'].'</p>';
    }
    // notif stock
    $counts = $bdd->query('select count(*)compt from stock where stat="new"');
    $count = $counts->fetch();
    if ($count['compt']<1) {
         $notificat = '';
    }else{
         $notificat ='<p>'.$count['compt'].'</p>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
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
                    <a href="#">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="title">Tableau de Bord <i class="fa fa-arrow-right"></i></span>
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
                    <a href="inscription.php">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="title">Nouveau Admin</span>
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
            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"> <?php echo $notifi ?></div>
                        <div class="cardName">Matieres Premières Entrées</div>
                    </div>
                    <div class="iconBx">
                        <img src="Images/epices.png" alt="" style="width:30px;">
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $notific ?></div>
                        <div class="cardName">Fournissers Entrées</div>
                    </div>
                    <div class="iconBx">
                        <img src="Images/fournisseur.png" alt="" style="width:30px;">
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $notifica ?></div>
                        <div class="cardName">Commandes Entrées</div>
                    </div>
                    <div class="iconBx">
                         <img src="Images/cmd.png" alt="" style="width:30px;">
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $notificat ?></div>
                        <div class="cardName">Stocks Entrées</div>
                    </div>
                    <div class="iconBx">
                        <img src="Images/boxes.png" alt="" style="width:30px;">
                    </div>
                </div>
            </div>
           
            <div class="details">
                 <!-- liste en details-->
            <div class="recentOrders">
                     <div class="cardHeader">
                        <h2>Epices</h2>
                        <a href="liste_matiere.php" class="btn">Voir Tout</a>
                     </div>
            <table>
               <thead>
                 <tr>
                 <td>Epices</td>
                 <td>Quantite</td>
                 <td>Unité de mesure</td>
                 <td>Prix </td>
                 <tbody>
                </tr>
              </thead>
              <tbody>
                   <?php
                    while($matiere = $matieres->fetch()){
                        echo'<tr>
                                <td>'.$matiere['Nom_Mp'].'</td>
                                <td>'.$matiere['Quantite_Mp'].'</td>
                                <td>'.$matiere['Unite_mesure'].'</td>
                                <td>'.$matiere['Prix_unitaire'].'<span>$</span></td>  
                              </tr>';
                          }
             
                   ?>
             </tbody>
            </table>   
        </div>
        <!-- fournisseur -->
        <div class="recentfourni">
             <div class="cardHeader">
                <h2>Fournisseurs</h2>
                <a href="liste_fournisseur.php" class="btn">Voir Tout</a>
             </div>
             <table>
              <thead>
                <tr>
                 <th>Fournisseur</th>
                 <th>Contact</th>
                </tr>
              </thead>
              <tbody>
                   <?php
                    while($fournisseur = $fournisseurs->fetch()){
                        echo'<tr>
                                <td>'.$fournisseur['Nom_fourni'].'</td>
                                <td>'.$fournisseur['Contact'].'</td>
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