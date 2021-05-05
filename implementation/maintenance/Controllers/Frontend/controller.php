<?php
require("Models/Frontend/modele.php");

function getConnexionPage(){
  require('Vue/Frontend/Connexion.php');
  if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
    $email=$_POST['email'];
    $mdp=$_POST['password'];

    $fonction = getTableConnexion($email,$mdp);

    if(!empty($fonction)){
      if($fonction=="technicien"){
       echo "tehni" ;
      }
      else
        header("Location: ?action=client");
    }
  }
}


function clientIndex(){
  $idUser=$_SESSION["idUser"];
  require('Vue/Frontend/indexClient.php');
  $result= getTasks($idUser);
  $_SESSION["getTasks"]=$result;

  if(isset($_SESSION['ok'])) {
    unset($_POST);
    die("something");
  }else if ((isset($_SESSION['contact'])) && (isset($_POST['type']) && !empty($_POST['type'])) && (isset($_POST['priorite']) && !empty($_POST['priorite'])) && (isset($_POST['cause']) && !empty($_POST['cause'])) ){
    $contact=$_POST['contact'];
    $typeDefaillance=$_POST['type'];
    $priorite=$_POST['priorite'];
    $cause=$_POST['cause'];
    $message=$_POST['message'];

    addTask($idUser,$contact,$typeDefaillance,$priorite,$cause,$message);

    clientIndex();


    $_SESSION['ok'] = "ok";
    
  }
  echo $idUser;
}
?>