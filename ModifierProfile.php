<?php  require 'includes/templates/header.php'; 

if(isset($_GET['Modifier']))
{
      //si la confirmation de donne est accepter la modification ce fait a ce niveaux 

      $cin =$_GET['cin'];
      $nom =$_GET['nom'];
      $prenom =$_GET['prenom'];
      $tele =$_GET['tele'];
      $adresse =$_GET['adresse'];
      $email =$_GET['email'];
      $query = "UPDATE client SET nom=?, prenom=?, tele=?, adresse=? where cin=?";
      $stmt = $cnx->prepare($query);

      if($stmt->execute(array($nom,$prenom,$tele,$adresse,$cin)))
      {
         echo "<script>alert('Client Bien Modifier');  window.open('Reservation.php?true','_self');
               </script>";
      }else
      {
         echo " <script>window.open('index.php','_self');</script>";
      }
}

if(isset($_GET['matricule']))
{
    
      $_SESSION['Mtr']=$_GET['matricule'];
     
}
if(isset($_SESSION['user'])&& isset($_SESSION['cin']))
{

      $cin=$_SESSION['cin'];

      $client =get_From_fetch("*","client","where cin = '$cin'") ;

}else{
   echo " <script> window.open('Inscription.php','_self');</script>";
}

if($_SERVER['REQUEST_METHOD']=="POST")
{


      if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['tele'])&&isset($_POST['adresse']))
      {
        $cin =$_POST['cin'];
        $nom =$_POST['nom'];
        $prenom =$_POST['prenom'];
        $tele =$_POST['tele'];
        $adresse =$_POST['adresse'];
        $email =$_POST['email'];

                   //Confirmation de modification des donnes si oui redirection page de reservatuion 
       
        echo "<script> var dialog = confirm('Voulez vous confirmer votre reservation!!');
                 if(dialog==true){
                     window.open('ModifierProfile.php?Modifier&cin=$cin&nom=$nom&prenom=$prenom&tele=$tele&adresse=$adresse&email=$email','_self');

                 }else{
                    window.open('index.php','_self');
                 }</script>";
         
        }


}


      ?>
      <div class="hero inner-page" style="background-image: url('assets/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Confirmation</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Accueil</a> <span class="mx-2">/</span> <strong>Confirmation</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

       <div class="container" style="margin: 62px auto;">
        <div class="row">
          <div class="col-lg-12 mb-5" >
            <form action="ModifierProfile.php" method="post">
              <input type="hidden" name="cin"  value="<?php echo $client['cin']; ?>">
              <input type="hidden" name="email"  value="<?php echo $client[5]; ?>">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" disabled class="form-control" name="" value="<?php echo $client['cin']; ?>">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="nom" value="<?php echo $client[1]; ?>"  placeholder="Nom">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" name="prenom" value="<?php echo $client[2]; ?>"  placeholder="Prenom">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="tele" value="<?php echo $client[3]; ?>"  placeholder="Tele">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                   <input type="text" class="form-control" name="adresse" value="<?php echo $client[4]; ?>"  placeholder="Adresse">
                </div>
              </div>

               <div class="form-group row">
                <div class="col-md-12">
                   <input type="text" disabled class="form-control" name="" value="<?php echo $client[5]; ?>"  placeholder="Email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Confirmer">
                </div>
              </div>

             
            </form>
          </div>
        
        </div>
       </div>


  <?php  require 'includes/templates/footer.php'; ?>