<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['email'])&&isset($_POST['mdp']))
{
  $nom =$_POST['nom'];
  $prenom =$_POST['prenom'];
  $email =$_POST['email'];
  $mdp =$_POST['mdp'];
   

  
      $query = "INSERT INTO admin(nom,prenom,email,mdp) VALUES('$nom','$prenom','$email','$mdp')";
    $stmt = $cnx->prepare($query);
    if($stmt->execute()){
     
     echo " <script>alert('Admin Bien Ajouter');</script>";
     echo " <script>
                    window.open('?page=AjouterAdmin','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Admin Non Ajouter');</script>";
       echo " <script>
                    window.open('?page=AjouterAdmin','_self');
                  </script>";
    }
  
  
  
  
  }


}
 ?>
<div class="Ajouter">
	
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Admin</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterAdmin">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom </label>
                      <input type="text" class="form-control" name="nom" id="exampleInputName1" placeholder="Nom">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Prenom </label>
                      <input type="text" class="form-control" name="prenom" id="exampleInputName1" placeholder="Prenom">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Email </label>
                      <input type="text" class="form-control" name="email" id="exampleInputName1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Mot de passe </label>
                      <input type="text" class="form-control" name="mdp" id="exampleInputName1" placeholder="Mot de passe">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>