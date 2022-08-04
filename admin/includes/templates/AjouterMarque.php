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
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['libelle']))
{
	$libelle =$_POST['libelle'];
	 

	
      $query = "INSERT INTO marque(libelle) VALUES('$libelle')";
    $stmt = $cnx->prepare($query);
    if($stmt->execute()){
     
     echo " <script>alert('Marque Bien Ajouter');</script>";
     echo " <script>
						       	window.open('?page=AjouterMarque','_self');
						      </script>";

    }
    else{
    	echo " <script>alert('Marque Non Ajouter');</script>";
    	 echo " <script>
						       	window.open('?page=AjouterMarque','_self');
						      </script>";
    }
	
	
	
	
  }


}
 ?>
<div class="Ajouter">
	
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Marque</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="POST" action="?page=AjouterMarque">
                    <div class="form-group">
                      <label for="exampleInputName1">Libelle </label>
                      <input type="text" class="form-control" name="libelle" id="exampleInputName1" placeholder="Libelle">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>