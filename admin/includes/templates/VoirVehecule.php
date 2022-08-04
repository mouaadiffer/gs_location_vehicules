<script type="text/javascript">
  var vehecule = document.getElementById('vehecule');
  vehecule.setAttribute('aria-expanded', true);
  // basic.classList.add("show");
  var basic = document.getElementById('ui-basic');
  basic.classList.add("show");
  var consulter = document.getElementById('consulter');
  consulter.classList.add("active");

</script>
<?php 
$matricule = $_GET['IdVehecule'];
// echo "<script>alert('$matricule');</script>";
$Vehecules = get_From("vehecule.matricule ,vehecule.couleur,vehecule.modele,vehecule.carburant,marque.libelle,categorie.libelle ,fournisseur.departement,vehecule.is_achat,vehecule.img,localisations.localisation","vehecule",
  "INNER JOIN marque on marque.id=vehecule.id_marque
   INNER JOIN categorie on categorie.id=vehecule.id_categorie
   INNER JOIN fournisseur on fournisseur.id=vehecule.id_fournisseur
   INNER JOIN localisations on localisations.matr_vehecule=vehecule.matricule
   where vehecule.matricule='".$matricule."'");
$reservation = get_From_fetch("status","reservation","where matr_vehecule='$matricule'");
// $reparation = get_From_fetch("status","reparation","WHERE reparation.matr_vihecule='$matricule'
// GROUP BY status
// ORDER by MAX(reparation.date_debut)DESC
// LIMIT 1");

$query = "select status from reparation WHERE reparation.matr_vihecule='$matricule' GROUP BY status ORDER by MAX(reparation.date_debut) DESC LIMIT 1";
$stmt = $cnx->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
//$reparation = $row['status'];
$reparation = empty($row['status'])?"empty":$row['status'];
?>
<div class="voir">
	  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Véhecule</h4>
                  <p class="card-description">
                    
                  </p>
              </div>
              <div class="container" style="margin-bottom: 3%;">
              	<?php
                
                          foreach($Vehecules as $Vehecule)
                          {
                              ?>
              	<div class="row">
              		<div class="col-lg-4">
              			 <div class="Slide" style="width: 100%;" style="height: 100%;">
              				<!-- <img style="width: 100%;"src="../Image/<?php echo $Vehecule[8]; ?>"> -->
                      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <?php
                            $explo =explode(",", $Vehecule[8]);
							if(count($explo)>2)
							{
                            for($i=0;$i<count($explo)-1;$i++){
                            ?>
                            
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
                           
                          <?php
						      }
						    }
						  ?>
                          </ol>
                          <div class="carousel-inner">

                            <?php
                            $explo =explode(",", $Vehecule[8]);

                            ?>
                            <div class="carousel-item active">
                              <img  style="width: 100%;" class="d-block w-100" src="../Image/<?php echo $explo[0]; ?>" alt="First slide">
                            </div>
                            <?php
                            $supp = array_shift($explo);
                            $supp = array_pop($explo);
                            foreach($explo as $key){
                            ?>
                            <div class="carousel-item ">
                              <img  style="width: 100%;" class="d-block w-100" src="../Image/<?php echo $key; ?>" alt="First slide">
                            </div>
                           
                             <?php 
							}
							?>
                           
                          </div>
  
                      </div>
              			</div>
              			
              	</div>
              		<div class="col-lg-8">
              			<div class="details-div">
              			<div >
              				<label>Matricule : </label>
              				<label><?php echo $Vehecule[0]; ?></label>
              			</div>
              			<div>
              				<label>Couleur : </label>
              				<label><?php echo $Vehecule[1]; ?></label>
              			</div>
              			<div>
              				<label>Modele : </label>
              				<label><?php echo $Vehecule[2]; ?></label>
              			</div>
              			<div>
              				<label>Carburant : </label>
              				<label><?php echo $Vehecule[3]; ?></label>
              			</div>
              			<div>
              				<label>Marque : </label>
              				<label><?php echo $Vehecule[4]; ?></label>
              			</div>
              			<div>
              				<label>Categorie : </label>
              				<label><?php echo $Vehecule[5]; ?></label>
              			</div>
              			<div>
              				<label>Fournisseur : </label>
              				<label><?php echo $Vehecule[6]; ?></label>
              			</div>
              			<div>
              				<label>Type Achat : </label>
              				<label>


              					<?php 
              					if($Vehecule[7]==0){
              						echo "Achat";

              					}else{
              						echo "Location";
              					}
              					?>

              					
              						
              			    </label>
              			</div>
              			<div>
              				<label>Réparation : </label>
              				<label>
              					<?php
              					
								  $rep = empty($reparation)?NULL:$reparation;
								//   echo "<script>alert('$rep')</script>";
								//   echo var_dump($rep);
								switch($reparation)
								{
									case "reparer" : echo "Réparer";
									          break;
									case "encours" : echo "En cours reparation";
									           break;
									case "empty" : echo "";
								               break;
									
								}
              					//  if ($reparation==1){
              					 
              					//  	echo "Reparer";

              					//  }elseif($reparation==0 && $reparation!=Null){
              					//  	echo "En cours reparation";
              					//  }else{
              					//  	echo " ";
              					//  }

              				    ?>
								  
              				       	
              				</label>
              			</div>
              			<div>
              				
              				<label>

              					<?php
                        $Vehecule[9];


              				    ?>
                          <a href="https://www.google.com/maps/place/<?php echo $Vehecule[9] ?>" target="_blank">
                          <button class="btn  btn-info">Locatisation</button>
                          </a>
              				</label>
              			</div>



              			</div>
              		</div>
              	</div>
              	<?php } ?>
              </div>
      </div>
</div>