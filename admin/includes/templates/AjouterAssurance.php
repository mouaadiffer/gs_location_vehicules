<?php 
$vehecules = get_From("*","vehecule");

if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['nom']))
{
  $nom =$_POST['nom'];
  $date =$_POST['date'];
  $matr_vihecule =$_POST['matr_vihecule'];

  $date_exp = date('Y-m-d', strtotime($date. ' + 365 days'));
   
   
  if($matr_vihecule!='0'){
    $query = "INSERT INTO assurence(nom,date_assur,date_exp,matr_vihecule) VALUES('$nom','$date',
      '$date_exp','$matr_vihecule')";
    $stmt = $cnx->prepare($query);
    if($stmt->execute()){
     
     echo " <script>alert('Assurance Bien Ajouter');</script>";
     echo " <script>
                    window.open('?page=AjouterAssurance','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Assurance Non Ajouter');</script>";
       echo " <script>
                    window.open('?page=AjouterAssurance','_self');
                  </script>";
    }
  }else{
     echo " <script>alert('Choisir un matricule');</script>";
       echo " <script>
                    window.open('?page=AjouterAssurance','_self');
                  </script>";
  }
  
      
  
  
  
  
  }


}
 ?>
<div class="Ajouter">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Assurance</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterAssurance">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom d'assurance </label>
                      <input type="text" class="form-control" name="nom" id="exampleInputName1" placeholder="Nom d'assurance">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Date </label>
                      <input type="date" class="form-control" name="date" id="exampleInputName1" placeholder="Date">
                    </div>
                     <div class="form-group">
                      <label for="exampleSelectGender">Matricule Vehecule</label>
                        <select class="form-control" name="matr_vihecule" id="exampleSelectGender">
                                <option value="0">Matricule Vehecule</option>
                               <?php

                                foreach ($vehecules as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[0] ."</option>";
                                }
                                ?> 
                        </select>
                    </div>
                   
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>