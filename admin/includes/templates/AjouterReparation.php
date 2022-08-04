<?php 
$vehecules = get_From("*","vehecule");
$entretiens = get_From("*","entretien");
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['date_debut']))
{
  $date_debut =$_POST['date_debut'];
  $matr_vihecule =$_POST['matr_vihecule'];
  $id_entretien =$_POST['id_entretien'];

  if(getCount("reparation","where matr_vihecule='$matr_vihecule' and status='encours'")<=0){
      if($matr_vihecule>0 || $id_entretien>0){
         $query = "INSERT INTO reparation(date_debut,matr_vihecule,id_entretien,status) VALUES('$date_debut','$matr_vihecule','$id_entretien','encours')";
         $stmt = $cnx->prepare($query);
          if($stmt->execute())
          {
           
               echo " <script>alert('Reparation ajouté');</script>";
               echo " <script>
                              window.open('?page=AjouterReparation','_self');
                            </script>";

          }else{
                echo " <script>alert('Impossible d'ajouter cette réparation');</script>";
                echo " <script>
                              window.open('?page=AjouterReparation','_self');
                            </script>";
          }

  
     
     }
}else{
   echo " <script>alert('Cette véhecule en cours de reparer');</script>";
}


    
  
  
  
  
  }


}
 ?>
<div class="Ajouter">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Réparation</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterReparation">
                    <div class="form-group">
                      <label for="exampleInputName1">Date Debut </label>
                      <input type="date" class="form-control" name="date_debut" id="exampleInputName1" placeholder="Date Debut">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Matricule Réparation</label>
                        <select class="form-control" name="matr_vihecule" id="exampleSelectGender">
                                <option value="0">Matricule Vehecule</option>
                               <?php

                                foreach ($vehecules as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[0] ."</option>";
                                }
                                ?> 
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Entretien</label>
                        <select class="form-control" name="id_entretien" id="exampleSelectGender">
                                <option value="0">Entretien</option>
                               <?php

                                foreach ($entretiens as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[1] ."</option>";
                                }
                                ?> 
                        </select>
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>