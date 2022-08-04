<?php 
require 'includes/templates/header.php'; 
  $alert="";
if(isset($_GET['true']))
{


     if((isset($_POST['date_debut'])&&isset($_POST['date_fin'])) || (isset ($_SESSION['date_debut']) && isset($_SESSION['date_fin'])))
     {
        $date_debut="";
        $date_fin="";
         if(isset ($_SESSION['date_debut']) && isset ($_SESSION['date_fin'])){
            $date_debut=$_SESSION['date_debut'];
            $date_fin=$_SESSION['date_fin'];
         }else{
          $date_debut=$_POST['date_debut'];
          $date_fin=$_POST['date_fin'];
         }
        $matricule=$_SESSION['Mtr'];
        
        $cin=$_SESSION['cin'];
        


        $query = "INSERT INTO reservation(matr_vehecule,cin_client,date_debut,date_fin) 
                  VALUES('$matricule','$cin','$date_debut','$date_fin')";
        $stmt = $cnx->prepare($query);
        if($stmt->execute())
        {
         unset($_SESSION["date_debut"]);
         unset($_SESSION["date_fin"]);
             $alert="<div class='container' style='margin: 62px auto;'>
                        <div class='row'>
                           <div class='col-lg-12 mb-5' >
                               <div style='width: 100%;height: auto;background-color:#E9EBEC;'>
                                   <p style='margin: 0% auto;padding: 35px;width: 44%;height: auto;
                                             position: relative;top: 24%;font-size: 31px;'>
                                             Votre Réservation Bien Effectué!<br>
                                             <span style='font-size: 17px;'>
                                               Merci d'attendre un admin a accepté votre reservation 
                                               <a href='index.php'>Continue Votre Réservation</a>
                                             </span>
                                   </p>
                               </div>
                           </div>
                       </div>
                    </div>";

        }
        else
        {
             echo " <script>alert('Non confirmer');</script>";
             echo " <script>window.open('index.php','_self');</script>";
        }

     }

}else{
     echo " <script>window.open('error.php','_self');</script>";
}
?>

<div class="hero inner-page" style="background-image: url('assets/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Réservation</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Accueil</a> <span class="mx-2">/</span> <strong>Réservation</strong></div>
              </div>

            </div>
          </div>
        </div>

</div>
<?php if($alert!=""){
   echo  $alert; 
}elseif(!isset ($_SESSION['date_debut']) && !isset($_SESSION['date_fin'])){?>

  
    
<div class="container" style="margin: 62px auto;">

        <div class="row">
          <div class="col-lg-12 mb-5" >
            <form action="Reservation.php?true" method="post">

              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="date" class="form-control" name="date_debut" >
                </div>
                <div class="col-md-6">
                  <input type="date" class="form-control" name="date_fin" >
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
<?php  }  require 'includes/templates/footer.php';   ?>