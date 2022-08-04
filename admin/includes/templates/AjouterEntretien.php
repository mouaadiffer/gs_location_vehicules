<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['nom']))
{
  $nom =$_POST['nom'];
  $date =$_POST['date'];
  $type =$_POST['type'];
   

  
      $query = "INSERT INTO entretien(nom_garage,datee,type) VALUES('$nom','$date','$type')";
    $stmt = $cnx->prepare($query);
    if($stmt->execute()){
     
     echo " <script>alert('Entretien ajouté ');</script>";
     echo " <script>
                    window.open('?page=AjouterEntretien','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Entretien Non Ajouter');</script>";
       echo " <script>
                    window.open('?page=AjouterEntretien','_self');
                  </script>";
    }
  
  
  
  
  }


}
 ?>
<div class="Ajouter">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Entretien</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterEntretien">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom garage </label>
                      <input type="text" class="form-control" name="nom" id="exampleInputName1" placeholder="Nom garage">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Date </label>
                      <input type="date" class="form-control" name="date" id="exampleInputName1" placeholder="Libelle">
                    </div>
                    
                   <div class="form-group">
                      <label for="exampleSelectGender">Type</label>
                        <select class="form-control" name="type" id="exampleSelectGender">
                          <option value="Entretien Technique">Entretien Technique</option>
                          <option value="Maintenance préventive">Maintenance préventive</option>
                          <option value="Visite">Visite</option>
                          <option value="Révision">Révision</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>