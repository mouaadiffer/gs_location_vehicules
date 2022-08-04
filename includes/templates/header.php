<?php  require 'includes/cnxpdo.php';
require 'includes/functions/functions.php';
 global $cnx;

if(!isset($dontStartSession))
{
  session_start();
}
  ?>
<!doctype html>
<html lang="en">

  <head>
    <title>Auto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./Image/Auto.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

  </head>

  <body>
        <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


    
    
      <header style="z-index: 7;"  class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="index.html">
                  <img style="height:100%" class="img-fluid" src="image/Auto.png">
                </a>
              </div>
            </div>

            <div class="col-9">
              
              <span style="margin-left: 347px;" class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation  ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.php" class="nav-link">Accueil</a></li>
                  <li><a href="listing.php" class="nav-link">Annonces</a></li>
                  <li><a href="testimonials.php" class="nav-link">Témoignages</a></li>
              
                  <li><a href="about.php" class="nav-link">A propos</a></li>
                  <li><a href="contact.php" class="nav-link">Contact</a></li>
                  <li style="    margin-left: 12%;"> 
                     <?php if(isset($_SESSION['user'])){ 
                      ?>
                        <div class="dropdown">
                    <button style="background-color: #007bff;border-color: #007bff;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?php 
                      $email = $_SESSION['user'];
                      $query = "SELECT * FROM client WHERE email = '$email'";
                      $stmt = $cnx->prepare($query);
                      $stmt->execute();
                      $row = $stmt->fetch();

                       $_SESSION['cin'] = $row['cin'];

                      echo $row['prenom']." ".$row['nom']; 
                      ?> 
                       <i class="fa fa-user" style="margin-left: 5px;margin-right: -4px;"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      
                      <a class="dropdown-item" href="logout.php">Déconnecté </a>
                    </div>
                  </div>  
                  <?php  }else{?>
                     <div>

                        <a href="login.php" class="small mr-3"><span class="icon-unlock-alt"></span> Connexion</a>
                         <!-- Modal -->
          
                          <a style="    border-radius: 43px !important;" href="Inscription.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Inscription</a>
                       </div>


                  <?php }?>





                      
                  </li>
                </ul>
              </nav>
            </div>
           

            
          </div>
        </div>

      </header>