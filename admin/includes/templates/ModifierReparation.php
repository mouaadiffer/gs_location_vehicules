<?php 
$Pieces = get_From("*","piece");
if(isset($_GET['IdReparation'])){
   
            $rowsEdite=get_From('*','reparation',"INNER JOIN entretien on entretien.id=reparation.id_entretien
WHERE reparation.id='$_GET[IdReparation]'");
          }




if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_POST['date_fin']) &&isset($_POST["panne"])&&isset($_POST["id_piece"])&&isset($_POST["id"]))
{

  $date_fin =$_POST['date_fin'];
  $panne =$_POST['panne'];
  $id_piece =$_POST['id_piece'];
  $quantite =$_POST['quantite'];
  $id =$_POST['id'];
  $Prix1=get_From_fetch("prix","piece","where id=$id_piece");
  $Prix=$Prix1[0]*$quantite;





  $query="UPDATE reparation set date_fin=?,panne=?,id_piece=?,prix=?,status='reparer' where id=? ";
    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($date_fin,$panne,$id_piece,$Prix,$id))){
     
     echo " <script>alert('Reparation Bien Modifier');</script>";
     echo " <script>
                    window.open('?page=Reparation','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Reparation Non Modifier');</script>";
       echo " <script>
                    window.open('?page=Reparation','_self');
                  </script>";
    }
  }
}
?>
<div class="Modifier">
	
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Confirmer Réparation</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <?php foreach($rowsEdite as $key ){ ?>
                  <form class="forms-sample" method="POST" action="?page=ModifierReparation">
                    <input type="hidden" name="id" value="<?php echo $key[0]; ?>">

                    <div class="form-group">
                      <label for="exampleInputName1">Matricule </label>
                      <input type="text" disabled value="<?php echo $key[5]; ?>" class="form-control" name="matr_vihecule" id="exampleInputName1" placeholder="Matricule">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Entretien </label>
                      <input type="text" disabled value="<?php echo $key[9]; ?>" class="form-control" name="id_entretien" id="exampleInputName1" placeholder="Entretien">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Date Debut </label>
                      <input type="text" disabled value="<?php echo $key[1]; ?>" class="form-control" name="date_debut" id="exampleInputName1" placeholder="Date Debut">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Date Fin </label>
                      <input type="date" class="form-control" name="date_fin" id="exampleInputName1" placeholder="Date Fin">
                    </div>



                    <div class="form-group">
                      <label for="exampleInputName1">Panne </label>
                      <textarea class="form-control" name="panne" id="exampleInputName1" placeholder="Panne"></textarea>
                    </div>


                    <div class="form-group">
                      <label for="exampleSelectGender">Piece</label>
                        <select class="form-control" name="id_piece" id="exampleSelectGender">
                                <option value="0">Piece</option>
                               <?php

                                foreach ($Pieces as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[1] ."</option>";
                                }
                                ?> 
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Quantite </label>
                      <input type="number" class="form-control" name="quantite" id="exampleInputName1" placeholder="Quantite">
                    </div>

                    
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Confirmer</button>
                  
                  </form>
                <?php } ?>
                </div>
              </div>
</div>