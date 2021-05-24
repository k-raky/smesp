<?php
require("Models/modele.php");

function getConnexionPage(){
  require('Vue/Frontend/Connexion.php');
  if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
    $email=$_POST['email'];
    $mdp=$_POST['password'];

    $fonction = getTableConnexion($email,$mdp);

    if(!empty($fonction)){
      if($fonction=="technicien"){
        $result=getTech($_SESSION['idUser']);
        $_SESSION['titre']=$result['titre'];
        $_SESSION['service']=$result['service'];
        $_SESSION['nom']=$result['prenom']." ".$result['nom'];
        $_SESSION['contact']=$result['contact'];
        header("Location: ?action=chefService");
      }
      else
        header("Location: ?action=client");
    }
  }else{
    echo "<a href='/'></a>";
    session_destroy();
    unset($_POST);
  }
}


function clientIndex(){
  $idUser=$_SESSION["idUser"];
  require('Vue/Frontend/indexClient.php');

  if(isset($_SESSION['ok'])) {
    unset($_POST);
    unset($_SESSION['ok']);
  }else if ((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['fonction']) && !empty($_POST['fonction'])) && (isset($_POST['contact']) && !empty($_POST['contact'])) && (isset($_POST['departement']) && !empty($_POST['departement'])) && (isset($_POST['type']) && !empty($_POST['type'])) && (isset($_POST['priorite']) && !empty($_POST['priorite'])) && (isset($_POST['cause']) && !empty($_POST['cause'])) ){
    $contact=$_POST['contact'];
    $name=$_POST['name'];
    $fonction=$_POST['fonction'];
    $type=$_POST['type'];
    $priorite=$_POST['priorite'];
    $cause=$_POST['cause'];
    $message=$_POST['message'];
    $departement=$_POST['departement'];


    addTask($idUser,$name,$fonction,$contact,$type,$departement,$priorite,$cause,$message);

    $_SESSION['ok'] = "ok";

    echo "<meta http-equiv='refresh' content='0'>";
  }
}

function getChefServicePage(){
  require('Vue/Frontend/ChefService.php');
  
}

?>