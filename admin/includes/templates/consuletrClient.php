<?php

$Clients = get_From("*","client");
if(isset($_GET['IdClient'])){

    $cin =$_GET['IdClient'];

    $query="DELETE FROM client WHERE cin=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($cin))){
        echo " <script>alert('Client supprimé');</script>";

        echo '<script>window.open("?page=Client","_self");</script>';
    }
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Client</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Cin
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Prenom
                          </th>
                          <th>
                            Tele
                          </th>
                          <th>
                            Adresse
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
                
                          foreach($Clients as $Client)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $Client[0]; ?></th>
                                      <td><?php echo $Client[1]; ?></td>
                                      <td><?php echo $Client[2]; ?></td>
                                      <td><?php echo $Client[3]; ?></td>
                                      <td><?php echo $Client[4]; ?></td>
                                      <td><?php echo $Client[5]; ?></td>
                                     
                                      
                                      <td >
                                         
                                          <?php echo "<a title='Supprimer' href='?page=Client&IdClient=".$Client['cin']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                  
                </div>
              </div>
            </div>
</div>
  

</div>