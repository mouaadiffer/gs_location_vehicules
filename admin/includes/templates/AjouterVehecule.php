
<script type="text/javascript">
  var vehecule = document.getElementById('consulter');
  vehecule.setAttribute('aria-expanded', true);
  // basic.classList.add("show");
  var basic = document.getElementById('ui-basic');
  basic.classList.add("show");
  var consulter = document.getElementById('consulter');
  consulter.classList.add("active");
  
  
  

</script>
<?php 

         
          // echo " <script>alert($ville[0]);</script>";
$NomsI="";
$Marques = get_From("*","marque");
$Categories = get_From("*","categorie");
$Fournisseurs = get_From("*","fournisseur");
// if($_SERVER['REQUEST_METHOD']=="POST"){
  // $Images=$_FILES;
  // $Noms=$Images["img"]["name"];
  // $Tmp=$Images["img"]["tmp_name"];
    
  // echo"<pre>";
  // print_r($Tmp);
  // // echo $Noms[0];
  // foreach($Noms as $key=>$value)
  // { 
  //    $img = rand(0,1000).'_'.$value;
  //    foreach($Tmp as $key1=>$value1){
  //      move_uploaded_file($value1, "../Image/test/$img");

  //    }
      
  //   $NomsI.= $img . "||";
  // }
  // echo $NomsI;
  


if($_SERVER['REQUEST_METHOD']=="POST"){
   if(isset($_POST['matricule']) &&isset($_POST['couleur']) && isset($_POST['modele']) && isset($_POST["carburant"])&& isset($_POST["id_marque"]) && isset($_POST["id_categorie"])&& isset($_POST["id_fournisseur"])    ){
$is_achat=1;


if(isset($_POST['achat'])){
  $is_achat=0;
}

        // $ImgName = $_FILES['img']['name'];
        // $ImgTmp = $_FILES['img']['tmp_name'];
        // $explo=explode('.', $ImgName);
        // $ImgExtension = strtolower(end($explo));
        
       
       $matricule = $_POST['matricule'];
       $couleur = $_POST['couleur'];
       $modele = $_POST['modele'];
       $carburant = $_POST['carburant'];
       $id_marque = $_POST['id_marque'];
       $id_categorie = $_POST['id_categorie'];
       $id_fournisseur = $_POST['id_fournisseur'];

       foreach ($_FILES['img']['name'] as $key=>$val){

            $file=rand(0,1000).'_'.$val;
            move_uploaded_file($_FILES['img']['tmp_name'] [$key], '../Image/'.$file);
            $NomsI.= $file . ",";
        }
        // $explo =explode(",","$NomsI");
        // echo $explo[0];


      
     

       if(!checkItem("vehecule","matricule","$matricule")){
          if($id_categorie>0 || $id_marque>0 || $id_fournisseur>0){


      $stm = $cnx->prepare("INSERT INTO vehecule(matricule,couleur,modele,carburant,id_marque,id_categorie,id_fournisseur,is_achat,img)VALUES 
         ('$matricule','$couleur','$modele','$carburant','$id_marque','$id_categorie','$id_fournisseur','$is_achat','$NomsI')");
        $stm->execute();
        $count =$stm->rowCount();
     
        if($count>0)
        {

             $array = array("Rabat", "cabalanca", "Mohammédia", "Marrakech","Essaouira","Agadir","Fès");
             $ville=array_rand($array,2);
             $ville1=$array[$ville[0]];
             $stm = $cnx->prepare("INSERT INTO localisations(matr_vehecule,localisation)VALUES 
             ('$matricule','$ville1')");
             $stm->execute();
             $count =$stm->rowCount();
            
             echo " <script>alert('Véhicule ajouté');</script>";
             echo "<script> window.open('?page=AjouterVehecule','_self');
                              </script>";
            
        }else{
           echo " <script>alert('Véhicule non ajouté');</script>";
            echo "<script>  window.open('?page=AjouterVehecule','_self');
                              </script>";
        }
       


}else{
    echo "<script> alert('Choisir une marque et une Categorie at un Fournisseur');
                              </script>";
}
}else{
  echo "<script> alert('Ce Matricule déja existe');
                              </script>";
}
     
     

   }
}
 ?>
<div class="Ajouter">
  
  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Véhecule</h4>
                  <p class="card-description">
                    
                  </p>
                  <br>
                  <form class="forms-sample" method="post" enctype="multipart/form-data" action="?page=AjouterVehecule">

                    <div class="form-group">
                      <label for="exampleInputName1">Matricule </label>
                      <input type="text" class="form-control" name="matricule" id="exampleInputName1" placeholder="Matricule">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Couleur </label>
                      <input type="text" class="form-control" name="couleur" id="exampleInputName1" placeholder="Couleur">
                    </div>
                    
                    
                   
                       <div class="form-group">
                      <label for="exampleInputName1">Modele </label>
                      <input type="text" class="form-control" name="modele" id="exampleInputName1" placeholder="Modele">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Carburant </label>
                      <input type="text" class="form-control" name="carburant" id="exampleInputName1" placeholder="Carburant">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Marque</label>
                        <select class="form-control" name="id_marque" id="exampleSelectGender">
                                <option value="0">Marque</option>
                               <?php

                                foreach ($Marques as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[1] ."</option>";
                                }
                                ?> 
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Categorie</label>
                        <select class="form-control" name="id_categorie" id="exampleSelectGender">
                                <option value="0">Categorie</option>
                               <?php

                                foreach ($Categories as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[1] ."</option>";
                                }
                                ?> 
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Fournisseur</label>
                        <select class="form-control" name="id_fournisseur" id="exampleSelectGender">
                                <option value="0">Fournisseur</option>
                               <?php

                                foreach ($Fournisseurs as $key) {
                                    
                                    echo "<option value=".$key[0].">" . $key[1] ."</option>";
                                }
                                ?> 
                        </select>
                    </div>
                    <div class="form-group">
                          <div class="custom-file">
                            <input type="file" name="img[]" class="custom-file-input" id="inputGroupFile04" multiple>
                            <label class="custom-file-label"  for="inputGroupFile04">Choose file</label>
                          </div>
                         
                    </div>


                    <div class="col">
                        <p class="mb-2">Achat</p>
                      <label class="toggle-switch toggle-switch-info">
                        <input type="checkbox" name="achat" >
                        <span class="toggle-slider round"></span>
                      </label>                      
                    </div>
<br>

                    <button type="submit" class="btn btn-info mr-2">Ajouter</button>
                  
                  </form>
                </div>
              </div>
</div>