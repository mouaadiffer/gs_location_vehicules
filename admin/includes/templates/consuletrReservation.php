<?php
require '../phpmailer/SMTP.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/Exception.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

//pour mettre ajour la table reservation
 $query="UPDATE reservation set status=0 WHERE date_fin <= '".date("Y-m-d")."' ";
 $stmt = $cnx->prepare($query);
 $stmt->execute();
 

$reservations = get_From("*","reservation");
if(isset($_GET['IdReservationS'])){

    $id =$_GET['IdReservationS'];

    $query="DELETE FROM reservation WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        echo " <script>alert('Reservation Bien Supprimer');</script>";

        echo '<script>window.open("?page=Reservation","_self");</script>';
    }
    
           
}

if(isset($_GET['IdReservationC']) && isset($_GET['Matricule'])){

    $id =$_GET['IdReservationC'];
    $Matricule =$_GET['Matricule'];
    $reservation = get_From_fetch("*","reservation","WHERE id='$id'");
        $date_debut=$reservation[3];
      
       

    //pour tester si vehecule est deja resrver 
    if(getCount("reservation","where matr_vehecule= '$Matricule' and status=1 
                 and date_fin >= '$date_debut' ")>0)
    {
      echo " <script>alert('Vehecule Deja  Reserver');</script>";

    }else{

      $query="UPDATE reservation set status=1 WHERE id=?";

    
    $stmt = $cnx->prepare($query);
    if($stmt->execute(array($id))){
        $Clients = get_From_fetch("*","client","WHERE client.cin IN (SELECT reservation.cin_client 
                                  from reservation WHERE reservation.id='$id')");
       
                                      
          $nom=$Clients[1];
          $prenom=$Clients[2];
          $email = $Clients[5];
            
        
        try{
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'autoparcenterprise@gmail.com'; // Gmail address which you want to use as SMTP server
          $mail->Password = 'AutoParc2022'; // Gmail address Password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = '587';

          $mail->setFrom("$email"); // Gmail address which you used as SMTP server
          $mail->addAddress("$email"); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

          $mail->isHTML(true);
          $mail->Subject = 'Auto : Reservation Confirmer ';
          $mail->Body = "<p>Bonjour $nom  $prenom votre reservation bien confirmer !</p><br><p>Vous receviez une appel téléphonique plus tard  </p>";

          $mail->send();
    
        } catch (Exception $e){
          echo "<script>alert('$email')</script>";
        }

       
        echo " <script>alert('Reservation confirmé');</script>";

        echo '<script>window.open("?page=Reservation","_self");</script>';
       

     
       
    }
    }
   

    
    
           
}


?>
<div class="Marque">
  <div class="row">
  
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table Réservation</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Matricule
                          </th>
                          <th>
                            Client
                          </th>
                          <th>
                            Date Debut
                          </th>
                          <th>
                            Date Fin
                          </th>
                          <th>
                            Status
                          </th>
                          
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                
                          foreach($reservations as $reservation)
                          {
                              ?>
                                  <tr>
                                      <th scope="row"><?php echo $reservation[0]; ?></th>
                                    
                                      <td><?php echo $reservation[1]; ?></td>
                                      <td><?php echo $reservation[2]; ?></td>
                                      <td><?php echo $reservation[3]; ?></td>
                                      <td><?php echo $reservation[4]; ?></td>
                                      <td><?php 
                                             if($reservation[5]==0){
                                                echo "Attend"; 
                                             }else{
                                              echo "Confirmer"; 
                                             }

                                     
                                           ?>
                                             
                                      </td>
                                     
                                      
                                      <td >
                                         <?php echo "<a title='Confirmer' href='?page=Reservation&IdReservationC=".$reservation['id']."&Matricule=".$reservation[1]."' class='btn btn-success'><i class='icon-square-check'></i></a>"; ?> 
                                          <?php echo "<a title='Supprimer' href='?page=Reservation&IdReservationS=".$reservation['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </a>"; ?> 
                                         
                                      </td>
                                  </tr>
                              <?php
                          }
                        ?>
                        </tbody>
                    </table>

                  </div>
               
                  
                </div>
              </div>
            </div>
</div>
  

</div>