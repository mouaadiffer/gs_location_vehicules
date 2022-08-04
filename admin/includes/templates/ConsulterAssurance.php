<?php

$Assurnances = get_From("*","assurence");
if(isset($_GET['IdAssurence'])){

    $id =$_GET['IdAssurence'];

    $query="DELETE FROM assurence WHERE num=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Assurence Bien Supprimer');</script>";

        echo '<script>window.open("?page=Assurence","_self");</script>';
    }
    
           
}


?>
<div class="Entretien">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Assurance</h4>
                  
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
                             Nom
                          </th>
                          <th>
                             Date Assurnace
                          </th>
                          <th>
                            Date Expiration 
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($Assurnances as $Assurnance)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $Assurnance['num']; ?></th>
                                      <td ><?php echo $Assurnance[4]; ?></td>
                                      <td ><?php echo $Assurnance[1]; ?></td>
                                      <td ><?php echo $Assurnance[2]; ?></td>
                                      <td ><?php echo $Assurnance[3]; ?></td>
                                      <td ><?php
                                       $dateAujour= date('Y-m-d');
                                       $date=$Assurnance[3];
                                       if($dateAujour>$date){
                                        echo "<span style='background: red;
    padding: 6px;
    border-radius: 17%;
    color: white;'>expirer</span>"; 
                                       }else{
                                         echo "<span style='background:#28A745 ;
    padding: 6px;
    border-radius: 17%;
    color: white;'>aspirer</span>"; 
                                        
                                       }



                                       ?></td>
                                     
                                      
                                      <td >
                                          <?php echo "<a title='Modifier' href='?page=AssurenceExpirer&IdAssurence=".$Assurnance['num']."' class='btn btn-success'><i class='fas fa-edit'></i></a>"; ?> 
                                          <?php echo "<a title='Supprimer' href='?page=Assurence&IdAssurence=".$Assurnance['num']."' class='btn btn-youtube'><i class='fas fa-trash-alt'></i> </a>"; ?> 

                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterAssurance" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>