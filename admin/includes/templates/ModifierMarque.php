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
if(isset($_GET['IdMarque'])){
   
            $rowsEdite=get_From('*','marque',"where id='$_GET[IdMarque]'");
          }
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_POST['libelle']) &&isset($_POST["id"]))
{
  $libelle =$_POST['libelle'];

  
  $id =$_POST['id'];

  $query="UPDATE marque set libelle=? where id=? ";
    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($libelle,$id))){
     
     echo " <script>alert('Marque Bien Modifier');</script>";
     echo " <script>
                    window.open('?page=marque','_self');
                  </script>";

    }
    else{
      echo " <script>alert('Marque Non Modifier');</script>";
       echo " <script>
                    window.open('?page=marque','_self');
                  </script>";
    }
  }
}
?>
<div class="Modifier">
	
	<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Marque</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <?php foreach($rowsEdite as $key ){ ?>
                  <form class="forms-sample" method="POST" action="?page=ModifierMarque">
                    <input type="hidden" name="id" value="<?php echo $key[0]; ?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Libelle </label>
                      <input type="text" value="<?php echo $key[1]; ?>" class="form-control" name="libelle" id="exampleInputName1" placeholder="Libelle">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-info mr-2">Modifier</button>
                  
                  </form>
                <?php } ?>
                </div>
              </div>
</div>