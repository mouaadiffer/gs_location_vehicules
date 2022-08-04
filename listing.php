<?php  require 'includes/templates/header.php'; 
$reservations="";
if($_SERVER['REQUEST_METHOD']=="POST"){
  if($_POST['marque']>0 || $_POST['categorie']>0){

  $date_debut="";
  $date_fin="";

  $categorie = $_POST['categorie'];
  $marque = $_POST['marque'];
  if ($_POST['date_debut']!=""){
    $date_debut = $_POST['date_debut'];
     $_SESSION['date_debut']=$date_debut;
  }
  if ($_POST['date_fin']!="") {
   $date_fin = $_POST['date_fin'];
   $_SESSION['date_fin']=$date_fin;
  }
  
  
 
  
   

  $reservations=get_From("vehecule.*,marque.libelle,categorie.libelle",
                        "vehecule",
                        "INNER JOIN marque on marque.id=vehecule.id_marque
                         INNER JOIN categorie on categorie.id=vehecule.id_categorie
                         WHERE vehecule.matricule NOT in(SELECT reservation.matr_vehecule FROM reservation WHERE (status='1' and reservation.date_fin >='$date_debut') )
                         and vehecule.matricule NOT IN(SELECT reparation.matr_vihecule FROM reparation WHERE status='0') and marque.id='$marque' and categorie.id='$categorie'
                        ") ;
}else{
  echo "<script>alert('Merci de saisir une Marque ou une Véhicule ');</script>";
  echo "<script>window.open('index.php','_self');</script>";
}}else{
  $reservations =get_From("vehecule.*,marque.libelle,categorie.libelle",
                        "vehecule",
                        "INNER JOIN marque on marque.id=vehecule.id_marque
                         INNER JOIN categorie on categorie.id=vehecule.id_categorie
                         WHERE vehecule.matricule NOT in(SELECT reservation.matr_vehecule FROM reservation WHERE status='1' )
                         and vehecule.matricule NOT IN(SELECT reparation.matr_vihecule FROM reparation WHERE status='0')
                        ") ;
}


?>
      
<div class="hero inner-page" style="background-image: url('assets/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Annonces</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Accueil</a> <span class="mx-2">/</span> <strong>Annonces</strong></div>
              </div>

            </div>
          </div>
        </div>
</div>
<div class="site-section bg-light">
      <div class="container">
        <div class="row" style="    margin-bottom: 41px;">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Annonces véhicules</strong></h2>
               
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
            <h2 class="section-heading"><strong>Témoignages</strong></h2>
            <p class="mb-4"></p>    
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Un accueil très professionnel , chaleureux et rapide. Voiture conforme, très propre et parfaite pour la route."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="assets/images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Mike Fisher</span>
                  <span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Un accueil très professionnel , chaleureux et rapide. Voiture conforme, très propre et parfaite pour la route."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="assets/images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Jean Stanley</span>
                  <span>Traveler</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Ils ont été toujours là pour répondre à mon besoin, j'adore vraiement et je le recommande toujours aux autres clients."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="assets/images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Katie Rose</span>
                  <span >Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

   

      
      
    <?php require 'includes/templates/footer.php'?>