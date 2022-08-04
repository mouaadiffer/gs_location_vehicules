<?php require '../includes/cnxpdo.php';
 require 'includes/functions/functions.php'; 
   session_start();
 if(!isset($_SESSION['admin']))
  {
    header("location:login.php");
    exit();
  }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Auto Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div style="background: #3794fc;" class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="?page=dashboard"><img src="assets/images/Auto.png" style="width: 98px;height: 54px;" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="?page=dashboard"><img src="assets/images/Auto.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-start">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav style="    background: #3794fc;" class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img  src="assets/images/user.png">
          </div>
          <div class="user-name">
              Admin
          </div>
          <div class="user-designation">
            
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="?page=dashboard">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" id="vehecule" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Véhicule</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" id="consulter" href="?page=vehecule">Consulter</a></li>
                <li class="nav-item"> <a class="nav-link" id="marque" href="?page=marque ">Marques</a></li>
                <li class="nav-item"> <a class="nav-link" id="categories" href="?page=categorie">Categories</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=Reservation">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Réservation</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=Entretien">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Entretien</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=Fournisseur">
              <i class="icon-pie-graph menu-icon"></i>
              <span class="menu-title">Fournisseur</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=Piece">
              <i class="icon-command menu-icon"></i>
              <span class="menu-title">Piece</span>
            </a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=Assurence">
              <i class="icon-command menu-icon"></i>
              <span class="menu-title">Assurance</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="?page=Reparation">
              <i class="icon-command menu-icon"></i>
              <span class="menu-title">Réparation</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link"  href="?page=Client" >
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Client</span>
             
            </a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="?page=Admin" >
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Admin</span>
             
            </a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out menu-icon"></i>
             
              <span class="menu-title">Deconnecter</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         <?php
                 $page = isset($_GET['page'])?$_GET['page']:"dashboard";
                 switch($page)
                 {
                    
                     case "dashboard": include 'includes/templates/dashboard.php'; break;
                     case "vehecule": include 'includes/templates/consulterVehecule.php'; break;
                     case "marque": include 'includes/templates/consuletrMarque.php'; break;
                     case "categorie": include 'includes/templates/consulterCategories.php'; break;

                     case "AjouterVehecule": include 'includes/templates/AjouterVehecule.php'; break;
                     case "AjouterMarque": include 'includes/templates/AjouterMarque.php'; break;
                     case "AjouterCategorie": include 'includes/templates/AjouterCategorie.php'; break;


                     case "ModifierVehecule": include 'includes/templates/ModifierVehecule.php'; break;
                     case "ModifierMarque": include 'includes/templates/ModifierMarque.php'; break;
                     case "ModifierCategorie": include 'includes/templates/ModifierCategorie.php'; break;

                     case "Entretien": include 'includes/templates/ConsulterEntretien.php'; break;
                     case "AjouterEntretien": include 'includes/templates/AjouterEntretien.php'; break;

                     case "Fournisseur": include 'includes/templates/ConsulterFournisseur.php'; break;
                     case "AjouterFournisseur": include 'includes/templates/AjouterFournisseur.php'; break;

                     case "Piece": include 'includes/templates/ConsulterPiece.php'; break;
                     case "AjouterPiece": include 'includes/templates/AjouterPiece.php'; break;
                     case "ModifierPiece": include 'includes/templates/ModifierPiece.php'; break;

                     case "Assurence": include 'includes/templates/ConsulterAssurance.php'; break;
                     case "AjouterAssurance": include 'includes/templates/AjouterAssurance.php'; break;
                     case "AssurenceExpirer": include 'includes/templates/AssuranceExp.php'; break;


                     case "Reparation": include 'includes/templates/ConsulterReparation.php'; break;
                     case "AjouterReparation": include 'includes/templates/AjouterReparation.php'; break;
                     case "ModifierReparation": include 'includes/templates/ModifierReparation.php'; break;



                     case "Reservation": include 'includes/templates/consuletrReservation.php'; break;
                     case "Client": include 'includes/templates/consuletrClient.php'; break;

                     case "VoirVehecule": include 'includes/templates/VoirVehecule.php'; break;


                     case "Admin": include 'includes/templates/consulterAdmin.php'; break;
                     case "AjouterAdmin": include 'includes/templates/AjouterAdmin.php'; break;
                  
                    


  


              
                 }
                
                ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Auto.com 2022</span>
           
          </div>
         
        </footer>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

