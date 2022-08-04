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
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['libelle']))
{
  $libelle =$_POST['libelle'];
   

  
      $query = "INSERT INTO categorie(libelle) VALUES('$libelle')";
    $stmt = $cnx->prepare($query);
    if($stmt->execute()){
     
     echo " <script>alert('Categorie Bien Ajouter');</script>";
     echo " <script>
                    window.open('?page=AjouterCategorie','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Categorie Non Ajouter');</script>";
       echo " <script>
                    window.open('?page=AjouterCategorie','_self');
                  </script>";
    }
  
  
  
  
  }


}
 ?>
<div class="Ajouter">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Categorie</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterCategorie">
                    <div class="form-group">
                      <label for="exampleInputName1">Libelle </label>
                      <input type="text" class="form-control" name="libelle" id="exampleInputName1" placeholder="Libelle">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>