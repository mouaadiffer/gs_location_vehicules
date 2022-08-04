<?php 
if(isset($_GET['IdPiece'])){
   
            $rowsEdite=get_From('*','piece',"where id='$_GET[IdPiece]'");
          }
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_POST['libelle']) &&isset($_POST["id"]))
{
  $libelle =$_POST['libelle'];
  $prix =$_POST['prix'];

  
  $id =$_POST['id'];

  $query="UPDATE piece set libelle=?,prix=? where id=? ";
    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($libelle,$prix,$id))){
     
     echo " <script>alert('Piece Bien Modifier');</script>";
     echo " <script>
                    window.open('?page=Piece','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Piece Non Modifier');</script>";
       echo " <script>
                    window.open('?page=Piece','_self');
                  </script>";
    }
  }
}
?>
<div class="Modifier">
	
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Piece</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <?php foreach($rowsEdite as $key ){ ?>
                  <form class="forms-sample" method="POST" action="?page=ModifierPiece">
                    <input type="hidden" name="id" value="<?php echo $key[0]; ?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Libelle </label>
                      <input type="text" value="<?php echo $key[1]; ?>" class="form-control" name="libelle" id="exampleInputName1" placeholder="Libelle">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Prix </label>
                      <input type="text" value="<?php echo $key[2]; ?>" class="form-control" name="prix" id="exampleInputName1" placeholder="Prix">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Modifier</button>
                  
                  </form>
                <?php } ?>
                </div>
              </div>
</div>