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
$Marques = get_From("*","marque");
$Categories = get_From("*","categorie");
$Fournisseurs = get_From("*","fournisseur");

if(isset($_GET['IdVehecule'])){
   
            $rowsEdite=get_From('*','vehecule',"where matricule='$_GET[IdVehecule]'");
          }

if($_SERVER['REQUEST_METHOD']=="POST"){

   if(isset($_POST['matricule']) &&isset($_POST['couleur']) && isset($_POST['modele']) && isset($_POST["carburant"])&& isset($_POST["id_marque"]) && isset($_POST["id_categorie"])&& isset($_POST["id_fournisseur"])    ){
     
        
      $matricule = $_POST['matricule'];
       $couleur = $_POST['couleur'];
       $modele = $_POST['modele'];
       $carburant = $_POST['carburant'];
       $id_marque = $_POST['id_marque'];
       $id_categorie = $_POST['id_categorie'];
       $id_fournisseur = $_POST['id_fournisseur'];

      


          $stm = $cnx->prepare("UPDATE vehecule SET couleur = '$couleur',modele = '$modele',carburant = '$carburant',id_marque = '$id_marque',id_categorie = '$id_categorie',id_fournisseur = '$id_fournisseur' WHERE matricule = '$matricule'");
        $stm->execute();
        $count =$stm->rowCount();
     
        if($count>0)
        {
            
            echo"<script>alert('Bien Modifier');</script>";
             echo "<script>
                window.open('?page=vehecule','_self');
             </script>";
            
        }else{

          
            echo "<script>  window.open('?page=vehecule','_self');
                              </script>";
        }

   }
}
 ?>
<div class="Modifier">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Véhecule</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                   <?php foreach($rowsEdite as $key ){ ?>
                  <form class="forms-sample" method="post" enctype="multipart/form-data" action="?page=ModifierVehecule">

                    <input type="hidden" name="matricule" value="<?php echo $key[0]; ?>">

                    <div class="form-group">
                      <label for="exampleInputName1">Couleur </label>
                      <input type="text" class="form-control" name="couleur" value="<?php echo $key[1]; ?>" id="exampleInputName1" placeholder="Couleur">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Modele </label>
                      <input type="text" class="form-control" name="modele" value="<?php echo $key[3]; ?>" id="exampleInputName1" placeholder="Modele">
                    </div>
                    
                    
                    

                    <div class="form-group">
                      <label for="exampleInputName1">Carburant </label>
                      <input type="text" class="form-control" name="carburant" value="<?php echo $key[5]; ?>" id="exampleInputName1" placeholder="Carburant">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Marque</label>
                        <select class="form-control" name="id_marque"  id="exampleSelectGender">
                                <option value="<?php echo $key[2]; ?>" >Marque</option>
                              <?php

                                    
                                    foreach ($Marques as $key1) {
                                            if($key1[0]==$key[2]){
                                                
                                                echo "<option selected value=".$key1[0].">" . $key1[1] ."</option>";
                                            }else{
                                                echo "<option value=".$key1[0].">" . $key1[1] ."</option>";
                                            }
                                            
                                        }
                                    ?>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Categorie</label>
                        <select class="form-control" name="id_categorie" id="exampleSelectGender">
                                <option value="<?php echo $key[4]; ?>">Categorie</option>
                               <?php

                               
                                 foreach ($Categories as $key1) {
                                            if($key1[0]==$key[4]){
                                                
                                                echo "<option selected value=".$key1[0].">" . $key1[1] ."</option>";
                                            }else{
                                                echo "<option value=".$key1[0].">" . $key1[1] ."</option>";
                                            }
                                            
                                        }
                                ?> 
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Fournisseur</label>
                        <select class="form-control" name="id_fournisseur" id="exampleSelectGender">
                                <option value="<?php echo $key[6]; ?>">Fournisseur</option>
                             
                                <?php

                               
                                 foreach ($Fournisseurs as $key1) {
                                            if($key1[0]==$key[6]){
                                                
                                                echo "<option selected value=".$key1[0].">" . $key1[1] ."</option>";
                                            }else{
                                                echo "<option value=".$key1[0].">" . $key1[1] ."</option>";
                                            }
                                            
                                        }
                                ?> 
                        </select>
                    </div>
                      
                    

                   
<br>

                    <button type="submit" class="btn btn-info mr-2">Modifier</button>
                  
                  </form>
                   <?php } ?>

                </div>
              </div>
</div>