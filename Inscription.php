<?php  require 'includes/templates/header.php';  

if($_SERVER['REQUEST_METHOD']=="POST")
{

      if(isset($_POST['cin'])&&isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['tele'])
         &&isset($_POST['adresse'])&&isset($_POST['email'])&&isset($_POST['mdp'])&&isset($_POST['CMdp']))
      {
            $cin =$_POST['cin'];
            $nom =$_POST['nom'];
            $prenom =$_POST['prenom'];
            $tele =$_POST['tele'];
            $adresse =$_POST['adresse'];
            $email =$_POST['email'];
            $mdp =$_POST['mdp'];
            $CMdp =$_POST['CMdp'];

            if($mdp==$CMdp)
            {
                 $query = "INSERT INTO client(cin,nom,prenom,tele,adresse,email,mdp) 
                           VALUES('$cin','$nom','$prenom','$tele','$adresse','$email','$mdp')";
                 $stmt = $cnx->prepare($query);
                 if($stmt->execute()){
     
                       echo " <script>alert('Client Bien Ajouter');</script>";
                       echo " <script>window.open('index.php','_self');</script>";

                 }else{

                       echo " <script>alert('Client Non Ajouter');</script>";
                       echo " <script>window.open('index.php','_self');</script>";
                 }
            }else{

                 echo "<script>alert('Champ mot de paase ne correspond pas confirm mot de passe champ');
                               window.open('?content=Inscription.php','_self');</script>";
            }
   

    }

}

?>
<div class="hero inner-page" style="background-image: url('assets/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Inscription</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Accueil</a> <span class="mx-2">/</span> <strong>Inscription</strong></div>
              </div>

            </div>
          </div>
        </div>

</div>

<div class="container" style="margin: 62px auto;">

        <div class="row">
          <div class="col-lg-12 mb-5" >
            <form action="Inscription.php" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" name="cin" placeholder="CIN">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="nom" placeholder="Nom">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="tele" placeholder="Tele">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                   <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                </div>
              </div>

               <div class="form-group row">
                <div class="col-md-12">
                   <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="password" class="form-control" name="mdp" placeholder="Mot de passe ">
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="CMdp" placeholder="Confirme">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Enregistrer">
                </div>
              </div>

             
            </form>
          </div>
        
        </div>
</div>
<?php require 'includes/templates/footer.php'; ?>

  