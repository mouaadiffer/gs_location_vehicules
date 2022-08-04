<?php
 require '../includes/cnxpdo.php';
session_start();
$error ="";
if(isset($_SESSION['admin']))
{
    header("location:index.php");
    exit();
}
 if(isset($_POST['login']))
 {
     $email = $_POST['email'];
     $mdp = $_POST['mdp'];
     global $cnx;
    $query = "SELECT * FROM admin WHERE email='$email' and mdp='$mdp'";
    $stmt = $cnx->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    

    
     if($count>=1)
     {
         $_SESSION['admin'] = $email;
         echo "<script>
                  window.open('index.php','_self');
               </script>";
     }
     else
     {
         $error = "<p class='text-danger'>Email ou mot de passe incorrect !</p>";
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <!--favicon-->
	<link rel="icon" href="../assets/images/favicon.png" type="image/png" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag -->

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>



<div class="main">
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form action="login.php" method="post">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input style="width: 87%;" type="text"   name="email" placeholder="email" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fa fa-lock"></span><input style="width: 87%;" type="password"  name="mdp" placeholder="password"  required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                  <input class="btn btn-info font-weight-bold" name="login" style="    width: 100%;" type="submit" value="Sign In">     
                               
             </div>

          </fieldset>
<div class="clearfix"></div>
        </form>
        <?php echo $error ;  ?>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">
        <img src="../Image/Auto.png" style="    width: 71%;">
          
          <div class="clearfix"></div>
      </div>
      
      </div>
</center>
    </div>

</div>

</html>