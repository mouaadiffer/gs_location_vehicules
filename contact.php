<?php  require 'includes/templates/header.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  
 
   $name = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $message = $_POST['message'];
   

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'autoparcenterprise@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'AutoParc2022'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom("$email"); // Gmail address which you used as SMTP server
    $mail->addAddress('autoparcenterprise@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message reçu (page de contact)';
    $mail->Body = "<h3>Nom : $name <br>Prenom :$prenom <br>Email: $email <br>Message :$message </h3>";

    $mail->send();
    $alert = '<div style="    z-index: 8;
    background: #d4edda;
    font-size: 18px;
    padding: 20px 40px;
    min-width: 420px;
    position: fixed;
    right: 0;
    top: 10px;
    border-left: 8px solid #51be78;
    border-radius: 4px;" class="alert-success">
                 <span>Message envoyé! Merci de nous contacter.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div style="    z-index: 8;
    background: #FFF3CD;
    font-size: 18px;
    padding: 20px 40px;
    min-width: 420px;
    position: fixed;
    right: 0;
    top: 10px;
    border-left: 8px solid #FFA502;
    border-radius: 4px;"  class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>

      
      <div class="hero inner-page" style="background-image: url('assets/images/hero_1_a.jpg');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Contact</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.php">Accueil</a> <span class="mx-2">/</span> <strong>Contact</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

    

    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>Contactez-nous ou utilisez ce formulaire pour louer une vehecule</h2>
          
        </div>
      </div>
        <div class="row">
          <div class="col-lg-8 mb-5" >
            <?php echo $alert; ?>
            <form action="contact.php" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control" name="nom" placeholder="Nom">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" id="" class="form-control" placeholder="Votre Message." cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" name="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Envoyer Message">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Address:</span>
                  <span>12 Zohour MontFleuri2, Fés , Maroc</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Tele:</span><span>0535140100</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>autoparcenterprise@gmail.com</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


      
    <?php require 'includes/templates/footer.php'?>