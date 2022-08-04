<script type="text/javascript">
  var vehecule = document.getElementById('marque');
  vehecule.setAttribute('aria-expanded', true);
  // basic.classList.add("show");
  var basic = document.getElementById('ui-basic');
  basic.classList.add("show");
  var marque = document.getElementById('marque');
  marque.classList.add("active");

  
  

</script>
<?php

$Marques = get_From("*","marque");
if(isset($_GET['IdMarque'])){

    $id =$_GET['IdMarque'];

    $query="DELETE FROM marque WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Marque Bien Supprimer');</script>";

        echo '<script>window.open("?page=marque","_self");</script>';
    }
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Marques</h4>
                  
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
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($Marques as $Marque)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $Marque['id']; ?></th>
                                      <td style="width: 33%;"><?php echo $Marque['libelle']; ?></td>
                                     
                                      
                                      <td >
                                         <?php echo "<a title='Modifier' href='?page=ModifierMarque&IdMarque=".$Marque['id']."' class='btn btn-success'><i class='fas fa-edit'></i></a>"; ?> 
                                          <?php echo "<a title='Supprimer' href='?page=marque&IdMarque=".$Marque['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterMarque" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>