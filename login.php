<?php  require 'includes/templates/header.php';  



if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['email'])&&isset($_POST['mdp'])){
    $Email=$_POST['email'];
    $mdp=$_POST['mdp'];

      $query = "SELECT * FROM client where email='$Email' and mdp='$mdp'";
      $stmt = $cnx->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count>0){
         $_SESSION['user']=$Email;
    
       echo "<script>
              window.open('index.php','_self');
           </script>";
      }else{
         $erreur="<div style='margin-top: 13px;' class='alert alert-danger' >
                                    Mot de passe ou email incorrect
                                  </div>";
      }

  }
}

      ?>
      <div class="hero inner-page" style="background-image: url('assets/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Connéxion</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Accueil</a> <span class="mx-2">/</span> <strong>Connéxion</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

       <div class="container" style="    margin-bottom: 46px;">

      <form action="login.php" method="post">
                  <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                          <?php
                         if(isset($erreur)) {
                           echo $erreur;
 
                         }
                            
                        ?>
                                             </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Email</label>
                            <input type="text" name="email" id="username" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Mot de passe</label>
                            <input type="password" name="mdp" id="pword" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Connéxion" class="btn btn-primary btn-lg px-5">
                           
                                                        
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>

        <?php  require 'includes/templates/footer.php';  ?>