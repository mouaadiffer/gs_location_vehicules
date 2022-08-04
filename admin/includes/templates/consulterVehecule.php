
<script type="text/javascript">
  var vehecule = document.getElementById('consulter');
  vehecule.setAttribute('aria-expanded', true);
  // basic.classList.add("show");
  var basic = document.getElementById('ui-basic');
  basic.classList.add("show");
  var consulter = document.getElementById('consulter');
  consulter.classList.add("active");

  
  

</script>
<?php

$Vehecules = get_From("vehecule.matricule ,vehecule.couleur,vehecule.modele,vehecule.carburant,marque.libelle,categorie.libelle ,fournisseur.departement,vehecule.is_achat,vehecule.img","vehecule",
  "INNER JOIN marque on marque.id=vehecule.id_marque
   INNER JOIN categorie on categorie.id=vehecule.id_categorie
   INNER JOIN fournisseur on fournisseur.id=vehecule.id_fournisseur");


if(isset($_GET['IdVehecule'])){

    $id =$_GET['IdVehecule'];

    $query="DELETE FROM vehecule WHERE matricule=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Vehecule Bien Supprimer');</script>";

        echo '<script>window.open("?page=vehecule","_self");</script>';
    }
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" style="    width: 102%;">
                  <h4 class="card-title">Table Véhecule</h4>
                  
                  <div class="table-responsive">
                    <table style="    text-align: center;" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Image
                          </th>
                          <th>
                            Matricule
                          </th>
                           
                         
                           <th>
                            Couleur
                          </th>
                          
                          
                          
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($Vehecules as $Vehecule)
                          {
                              ?>
                                  <tr>

                                    <td>
                                      

                                      <img style="width: 80px;height: 80px;border-radius: 50%;" src="../Image/<?php

                                       $explo =explode(",", $Vehecule[8]);
                                       echo $explo[0]; 
                                      ?>">
                                    </td>
                                      <th scope="row"><?php echo $Vehecule[0]; ?></th>
                                      
                                    <td><?php echo $Vehecule[1]; ?></td>
                                   
                                    
                                 
                                    <td >
                                         <?php echo "<a title='Modifier' href='?page=ModifierVehecule&IdVehecule=".$Vehecule[0]."' class='btn btn-success'><i class='fas fa-edit'></i></a>"; 
                                         ?> 
                                         <?php echo "<a title='Voir' href='?page=VoirVehecule&IdVehecule=".$Vehecule[0]."' class='btn  btn-info'><i class='icon-eye'></i> </a>"; 
                                         ?> 
                                         <?php echo "<a title='Supprimer' href='?page=vehecule&IdVehecule=".$Vehecule[0]."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; 
                                         ?>                                          
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>
                   


                  </div>
               
                  <a style ="margin-top: 16px;"href="?page=AjouterVehecule" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    Ajouter
                  </a>
                </div>
              </div>
            </div>
</div>
  

</div>