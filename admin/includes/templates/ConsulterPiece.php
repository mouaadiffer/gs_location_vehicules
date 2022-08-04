<?php

$Pieces = get_From("*","piece");
if(isset($_GET['IdPiece'])){

    $id =$_GET['IdPiece'];

    $query="DELETE FROM piece WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Piece Bien Supprimer');</script>";

        echo '<script>window.open("?page=Piece","_self");</script>';
    }
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Pieces</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Libelle
                          </th>
                           <th>
                            Prix
                          </th>
                          
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($Pieces as $Piece)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $Piece['id']; ?></th>
                                      <td style="width: 33%;"><?php echo $Piece['libelle']; ?></td>
                                      <td style="width: 33%;"><?php echo $Piece['prix']; ?></td>
                                     
                                      
                                      <td >
                                         <?php echo "<a title='Modifier' href='?page=ModifierPiece&IdPiece=".$Piece['id']."' class='btn btn-success'><i class='fas fa-edit'></i></a>"; ?> 
                                          <?php echo "<a title='Supprimer' href='?page=Piece&IdPiece=".$Piece['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterPiece" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>