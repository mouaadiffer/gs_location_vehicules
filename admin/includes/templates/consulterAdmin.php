<?php

$Admins = get_From("*","admin");
if(isset($_GET['IdAdmin'])){

    $id =$_GET['IdAdmin'];

    $query="DELETE FROM admin WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Client Bien Supprimer');</script>";

        echo '<script>window.open("?page=Client","_self");</script>';
    }
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Admin</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Prenom
                          </th>
                          <th>
                            Email
                          </th>
                          
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($Admins as $Admin)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $Admin[0]; ?></th>
                                      <td><?php echo $Admin[1]; ?></td>
                                      <td><?php echo $Admin[2]; ?></td>
                                      <td><?php echo $Admin[3]; ?></td>
                                      
                                     
                                      
                                      <td >
                                         
                                          <?php echo "<a title='Supprimer' href='?page=Admin&IdAdmin=".$Admin['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterAdmin" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>