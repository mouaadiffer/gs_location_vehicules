<?php

$entretiens = get_From("*","entretien");
if(isset($_GET['IdEntretien'])){

    $id =$_GET['IdEntretien'];

    $query="DELETE FROM entretien WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Entretien Bien Supprimer');</script>";

        echo '<script>window.open("?page=Entretien","_self");</script>';
    }
    
           
}


?>
<div class="Entretien">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Entretien</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                             Nom garage
                          </th>
                          <th>
                             Date
                          </th>
                          <th>
                            Type
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($entretiens as $entretien)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $entretien['id']; ?></th>
                                      <td style="width: 33%;"><?php echo $entretien[1]; ?></td>
                                      <td style="width: 33%;"><?php echo $entretien[2]; ?></td>
                                      <td style="width: 33%;"><?php echo $entretien[3]; ?></td>
                                     
                                      
                                      <td >
                                       
                                          <?php echo "<a title='Supprimer' href='?page=Entretien&IdEntretien=".$entretien['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterEntretien" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>