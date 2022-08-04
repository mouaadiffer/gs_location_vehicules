<?php
//si status de reparation =0 : non repare si =1:repare

$Reparations = get_From("reparation.id,reparation.matr_vihecule,entretien.nom_garage,reparation.date_debut,reparation.date_fin,reparation.prix,reparation.status ","reparation","INNER JOIN entretien on entretien.id=reparation.id_entretien");
if(isset($_GET['IdReparation'])){

    $id =$_GET['IdReparation'];

    $query="DELETE FROM reparation WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Reparation Bien Supprimer');</script>";

        echo '<script>window.open("?page=Reparation","_self");</script>';
    }
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Réparation</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Matricule
                          </th>
                          
                          <th>
                            Entretien
                          </th>
                          <th>
                            Date Debut
                          </th>
                           <th>
                            Date Fin
                          </th>
                           <th>
                            Prix
                          </th>
                           <th>
                            Satatus
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($Reparations as $Reparation)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $Reparation[0]; ?></th>
                                      <td ><?php echo $Reparation[1]; ?></td>
                                      <td ><?php echo $Reparation[2]; ?></td>
                                      <td ><?php echo $Reparation[3]; ?></td>
                                      <td ><?php echo $Reparation[4]; ?></td>
                                      <td ><?php echo $Reparation[5]; ?></td>
                                      <td >
                                      <?php 

                                      $reparation = empty($Reparation['status'])?"empty":$Reparation['status'];
                                      switch($reparation)
                                      {
                                        case "reparer" : 
                                                      echo "<span style='background: #34CE57;
                                                            padding: 6px;
                                                            border-radius: 17%;
                                                            color: white;'>Réparer</span>"; 
                                                  break;
                                        case "encours" : 
                                                      echo "<span style='background: #F0A303;
                                                            padding: 6px;
                                                            border-radius: 17%;
                                                            color: white;'>En Cours</span>"; 
                                                   break;
                                        
                                      }
                                      

                                      ?>
                                        
                                      </td>
                                     
                                      
                                      <td >
                                         <?php echo "<a title='Modifier' href='?page=ModifierReparation&IdReparation=".$Reparation[0]."' class='btn btn-success'><i class='fas fa-edit'></i></a>"; ?> 
                                          <?php echo "<a title='Supprimer' href='?page=Reparation&IdReparation=".$Reparation[0]."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterReparation" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>