<?php  require 'includes/templates/header.php'; 
$categorie = get_From("*","categorie");
$marque = get_From("*","marque");
$rand_keys=[];
$reservations =get_From("vehecule.*,marque.libelle,categorie.libelle",
                        "vehecule",
                        "INNER JOIN marque on marque.id=vehecule.id_marque
                         INNER JOIN categorie on categorie.id=vehecule.id_categorie
                         WHERE vehecule.matricule NOT in(SELECT reservation.matr_vehecule FROM reservation WHERE status='1')
                         and vehecule.matricule NOT IN(SELECT reparation.matr_vihecule FROM reparation WHERE status='0') ORDER BY rand() ASC LIMIT 6
                        ") ;
?>   
<div class="hero" style="background-image: url('assets/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-12">

              <div class="titre-intro">
                <div class="intro">
                  <h1><strong>Louer une véhicule</strong> est au<br> bout de vos doigts.</h1>
                </div>
              </div>
              <br>
              
              <form class="trip-form" method="POST" action="listing.php" >
                
                <div  class="row align-items-center">
                  <div class="mb-3 mb-md-0 col-md-2">
                    <select name="categorie" id="" class="custom-select form-control">
                      <option value="0">Véhicule</option>
                        <?php

                                foreach ($categorie as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[1] ."</option>";
                                }
                        ?> 
                      
                    </select>
                  </div> 
                  <div class="mb-3 mb-md-0 col-md-2">
                    <select name="marque" id="" class="custom-select form-control">
                      <option value="0">Marque</option>
                      <?php

                                foreach ($marque as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[1] ."</option>";
                                }
                        ?>
                    </select>
                  </div>
                  <div class="mb-3 mb-md-0 col-md-2">
                    <div class="form-control-wrap">
                      <input type="date"  name="date_debut" placeholder="Date Dubut" class="form-control px-3">
                     

                    </div>
                  </div>
                  <div class="mb-3 mb-md-0 col-md-2">
                    <div class="form-control-wrap">
                      <input type="date"  name="date_fin" placeholder="Date Fin" class="form-control  px-3">
                      
                    </div>
                  </div>
                  <div class="mb-3 mb-md-0 col-md-2">
                    <input type="submit" value="Chercher" class="btn btn-primary btn-block py-3">
                  </div>
                </div>
                
              </form>

            </div>
          </div>
        </div>
</div>
  


<div class="site-section">
      <div class="container">
          <h2 class="section-heading"><strong>Comment ça fonctionne?</strong></h2>
          <p class="mb-5">
            Étapes faciles pour démarrer
          </p>    

          <div class="row mb-5">
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>1</span>
                <div class="step-inner">
                  <span class="number text-primary">01.</span>
                  <h3>Sélectionnez une véhicule</h3>
                  <p>Consulter nos véhicule et choisissez des meilleure véhicule!</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>2</span>
                <div class="step-inner">
                  <span class="number text-primary">02.</span>
                  <h3>Passer commande</h3>
                  <p>Passer vos commandes dans un temps plus vite !</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>3</span>
                <div class="step-inner">
                  <span class="number text-primary">03.</span>
                  <h3>Remplir le formulaire</h3>
                  <p>Insérer vos information pour effectuer vos commande!</p>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
      
<div class="site-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 text-center order-lg-2">
              <div class="img-wrap-1 mb-5">
                <img src="assets/images/feature_01.png" alt="Image" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-4 ml-auto order-lg-1">
              <h3 class="mb-4 section-heading">
                <strong>Vous pouvez facilement profiter de notre promo pour louer une voiture.</strong>
              </h3>
              <p class="mb-5">
                 Bénéficiez de tous nos services pour votre location de voiture en fonction de vos besoins : siège auto, GPS, option carburant etc.
              </p>
              
             
            </div>
          </div>
        </div>
</div>

      
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Annonces des vehecules</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>

        <div class="row">
           <?php $var=1; foreach($reservations as $key){ ?>
           <div class="col-md-6 col-lg-4 mb-4">

           <div class="listing d-block  align-items-stretch">
                <div class="listing-img h-100 mr-4" style="height: 269px !important;">
                  <div style="height: 93%;position: relative;overflow: hidden;">
                  <div id="carouselExampleIndicators<?php echo $var; ?>" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators" style="top:26%;">
                            <?php
                            $explo =explode(",", $key[8]);
                            for($i=0;$i<count($explo)-1;$i++){
                            ?>
                            
                            <li data-target="#carouselExampleIndicators<?php echo $var; ?>" data-slide-to="<?php echo $i; ?>" class="active"></li>
                           
                          <?php }?>
                          </ol>
                          <div class="carousel-inner" style="height: 25%;">

                            <?php
                            $explo =explode(",", $key[8]);

                            ?>
                            <div class="carousel-item active" style="height: 100%;">
                              <img  style="width: 100%;height: 100%;" class="d-block w-100 img-fluid" src="Image/<?php echo $explo[0]; ?>" alt="First slide">
                            </div>
                            <?php
                            $supp = array_shift($explo);
                             $supp2 = array_pop($explo);
                            foreach($explo as $key1){
                             

                            
                            ?>
                            <div class="carousel-item " style="height: 100%;">
                              <img  style="width: 100%;height: 100%;" class="d-block w-100" src="Image/<?php echo $key1; ?>" alt="First slide">
                            </div>
                           
                             <?php }?>
                           
                          </div>
  
                      </div>
                  <!-- <img  src="image/<?php echo $key[8]; ?>" alt="Image" class="image1 img-fluid"> -->
                  </div>
                </div>
                <div class="listing-img h-100 mr-4">
                      <h3><?php echo $key[10]; ?></h3>
                      <div class="rent-price"></div>
                      <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                          <div class="listing-feature pr-4">
                            <span class="caption">Couleur:</span>
                            <span class="number"><?php echo $key[1]; ?></span>
                          </div>
                          <div class="listing-feature pr-4">
                            <span class="caption">Modele:</span>
                            <span class="number"><?php echo $key[3]; ?></span>
                          </div>
                          <div class="listing-feature pr-4">
                            <span class="caption">Marque:</span>
                            <span class="number"><?php echo $key[9]; ?></span>
                          </div>
                      </div>
                      <div>
                       
                          <p>
                             <a href="ModifierProfile.php?matricule=<?php echo $key[0];  ?>" style="width: 55%;
    margin-left: 25%;" class="btn btn-primary btn-sm">Louer
                             </a>
                          </p>
                      </div>
                </div>

            </div>
          </div>
        <?php $var+=1;} ?>


        </div>
      </div>
</div>

<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Caractéristiques</strong></h2>
         
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 mb-5">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-home"></span>
              </span>
              <div class="service-1-contents">
                <h3>Découvrez notre localisation </h3>
                <p>721 FES SHORE - FEZ</p>
                <p class="mb-0"><a href="index.php">lire la suite</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-gear"></span>
              </span>
              <div class="service-1-contents">
                <h3>Paramètrer votre véhicule à vos choix </h3>
                <p>Nouvelles technologies chez nous!</p>
                <p class="mb-0"><a href="index.php">lire la suite</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-watch_later"></span>
              </span>
              <div class="service-1-contents">
                <h3>Toujours disponible à votre service! </h3>
                <p>24h/24h 7j/7j</p>
                <p class="mb-0"><a href="index.php">lire la suite</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-5">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-verified_user"></span>
              </span>
              <div class="service-1-contents">
                <h3>Nous avons des techniciens professionnelles spécialisés en sécurité !</h3>
                <p>Nouvelles moyens de maintenance et entretien. </p>
                <p class="mb-0"><a href="index.php">lire la suite</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-video_library"></span>
              </span>
              <div class="service-1-contents">
                <h3>N'hesitez pas à vous inscrire maintenant!</h3>
                <p>Nouvelle modèles des véhicules à louer pour tous</p>
                <p class="mb-0"><a href="index.php">lire la suite</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="service-1 dark">
              <span class="service-1-icon">
                <span class="icon-vpn_key"></span>
              </span>
              <div class="service-1-contents">
                <h3>Fiabilité, Sécurité </h3>
                <p>Nouvelle modèles des véhicules à louer pour tous</p>
                <p class="mb-0"><a href="index.php">lire la suite</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
</div>

<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Témoignages</strong></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"si vous chercher une location de voiture il faut aller chez CarRental, je reviens de marrakech, le patron de l'entreprise est au petit soin, il est venue nous chercher à l'aéroport"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="assets/images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Ahmed Saadaoui</span>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"J’ai loué une voiture pour 10 jours et à mon arrivée première surprise l’agence ne se trouve pas à l’aéroport,j’ai contacter cette dernière qui m’a envoyé une personne sur place."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="assets/images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Karima Majid</span>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"On ns donne une voiture qui ne correspond pas à notre réservation alors que j'étais le premier au kiosque. Véhicule sale pas d'eau dans le lave glace pas de contrat."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="assets/images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Soufia Naime</span>
                  <span >Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

  
<?php require 'includes/templates/footer.php'?>

 

