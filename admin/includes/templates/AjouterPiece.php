<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['libelle']))
{
  $libelle =$_POST['libelle'];
  $prix =$_POST['prix'];
   

  
      $query = "INSERT INTO piece(libelle,prix) VALUES('$libelle','$prix')";
    $stmt = $cnx->prepare($query);
    if($stmt->execute()){
     
     echo " <script>alert('Piece Bien Ajouter');</script>";
     echo " <script>
                    window.open('?page=AjouterPiece','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Piece Non Ajouter');</script>";
       echo " <script>
                    window.open('?page=AjouterPiece','_self');
                  </script>";
    }
  
  
  
  
  }


}
 ?>
<div class="Ajouter">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Piece</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterPiece">
                    <div class="form-group">
                      <label for="exampleInputName1">Libelle </label>
                      <input type="text" class="form-control" name="libelle" id="exampleInputName1" placeholder="Libelle">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Prix </label>
                      <input type="text" class="form-control" name="prix" id="exampleInputName1" placeholder="Prix">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>