<?php 
if(isset($_GET['IdAssurence'])){
   
            $rowsEdite=get_From('*','assurence',"where num='$_GET[IdAssurence]'");
          }
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_POST["id"]))
{
  $id =$_POST['id'];
  $nom =$_POST['nom'];
  
  

 

  $query="UPDATE assurence set nom=? where num=? ";
    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($nom,$id))){
     
     echo " <script>alert('Assurance Bien Modifiée');</script>";
     echo " <script>
                 window.open('?page=Assurence','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Assurance Non Modifier');</script>";
       echo " <script>
                    window.open('?page=Assurence','_self');
                  </script>";
    }
  }
}
?>
<div class="Modifier">
	
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Assurance</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <?php foreach($rowsEdite as $key ){ ?>
                  <form class="forms-sample" method="POST" action="?page=AssurenceExpirer">
                    <input type="hidden" name="id" value="<?php echo $key[0]; ?>"/>
                    <div class="form-group">
                      <label for="exampleInputName1">Matricule </label>
                      <input type="text" disabled value="<?php echo $key[4]; ?>" class="form-control" name="matr_vihecule" id="exampleInputName1" placeholder="Matricule">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">nom</label>
                      <input type="text" value="<?php echo $key[1]; ?>" class="form-control" name="nom" id="exampleInputName1" placeholder="Nom">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1" >Date Assurance  </label>
                      <input type="date" disabled value="<?php echo $key[2]; ?>" class="form-control" name="date_assur" id="exampleInputName1" placeholder="Date Assurance">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Date Expiration  </label>
                      <input type="text" disabled value="<?php echo $key[3]; ?>" class="form-control" name="date_exp" id="exampleInputName1" placeholder="Date Expiration">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Modifier</button>
                  
                  </form>
                <?php } ?>
                </div>
              </div>
</div>