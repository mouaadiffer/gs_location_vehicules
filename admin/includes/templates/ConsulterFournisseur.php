<?php

$fournisseurs = get_From("*","fournisseur");
if(isset($_GET['Idfournisseur'])){

    $id =$_GET['Idfournisseur'];

    $query="DELETE FROM fournisseur WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Fournisseur Bien Supprimer');</script>";

        echo '<script>window.open("?page=Fournisseur","_self");</script>';
    }
    
           
}


?>
<div class="Fournisseur">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Fournisseur</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                             Departement
                          </th>
                          <th>
                             Tele
                          </th>
                          <th>
                            Adresse
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($fournisseurs as $fournisseur)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $fournisseur['id']; ?></th>
                                      <td style="width: 33%;"><?php echo $fournisseur[1]; ?></td>
                                      <td style="width: 33%;"><?php echo $fournisseur[2]; ?></td>
                                      <td style="width: 33%;"><?php echo $fournisseur[3]; ?></td>
                                     
                                      
                                      <td >
                                       
                                          <?php echo "<a title='Supprimer' href='?page=Fournisseur&Idfournisseur=".$fournisseur['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterFournisseur" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>