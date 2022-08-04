<script type="text/javascript">
  var vehecule = document.getElementById('categories');
  vehecule.setAttribute('aria-expanded', true);
  // basic.classList.add("show");
  var basic = document.getElementById('ui-basic');
  basic.classList.add("show");
  var categories = document.getElementById('categories');
  categories.classList.add("active");

  
  

</script>
<?php

$Categories = get_From("*","categorie");
if(isset($_GET['IdCategorie'])){

    $id =$_GET['IdCategorie'];

    $query="DELETE FROM categorie WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Categorie Bien Supprimer');</script>";

        echo '<script>window.open("?page=categorie","_self");</script>';
    }
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Categories</h4>
                  
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
                
                          foreach($Categories as $categorie)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $categorie['id']; ?></th>
                                      <td style="width: 33%;"><?php echo $categorie['libelle']; ?></td>
                                     
                                      
                                      <td >
                                         <?php echo "<a title='Modifier' href='?page=ModifierCategorie&IdCategorie=".$categorie['id']."' class='btn btn-success'><i class='fas fa-edit'></i></a>"; ?> 
                                          <?php echo "<a title='Supprimer' href='?page=categorie&IdCategorie=".$categorie['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                   <a style ="    margin-top: 16px;"href="?page=AjouterCategorie" class="btn btn-info"><i class="fa fa-plus"></i>Ajouter</a>
                </div>
              </div>
            </div>
</div>
  

</div>