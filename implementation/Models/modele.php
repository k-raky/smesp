<?php

  function connectToBD(){
    $servername = "bejunitqknwdzbyfqz0y-mysql.services.clever-cloud.com";
    $username = "ulsartcj6ukxsuwr";
    $password = "fYEPeEbAu9sTiAzv276j";
    $dbname = "bejunitqknwdzbyfqz0y";


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
  }

  
  function getTableConnexion($email,$password){
    $conn=connectToBD();
    $sql = "SELECT idPersonne,fonction FROM tableConnexion WHERE email='".$email."' AND mdp='".$password."'";
    $result = mysqli_query($conn, $sql);
    $fonction="";
    $row=mysqli_fetch_assoc($result);

    if(!empty($row['idPersonne'])){
      $_SESSION['idUser']=$row['idPersonne'];
      $fonction=$row['fonction'];
    }

    mysqli_close($conn);
    
    return $fonction;
  }


  function addTask($idUser,$name,$fonction,$contact,$type,$departement,$priorite,$cause,$message){
    $conn=connectToBD();
    // $ref= date("Ymd:His");
    $sql="INSERT INTO taches (idDemandeur,nom,fonction,contact,type,departement,priorite,cause,message) VALUES ('".$idUser."','".$name."','".$fonction."','".$contact."','".$type."','".$departement."','".$priorite."','".$cause."','".$message."');";
    
    $result=mysqli_query($conn,$sql);
    if (!$result) {
      echo mysqli_error($conn);
    }
    
    mysqli_close($conn);
  }

  function getTasks($idUser){
    $conn=connectToBD();
    $sql = "SELECT * FROM taches WHERE idDemandeur='".$idUser."';";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    
    return $result;
  }

  function getAllTasks(){
    $conn=connectToBD();
    $sql = "SELECT * FROM taches ;";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    
    return $result;
  }

  function getSpecificTasks($service){
    $conn=connectToBD();
    $sql = "SELECT * FROM taches WHERE type='$service';";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    
    return $result;
  }

  function getWaitingTasks(){
    $conn=connectToBD();
    $sql = "SELECT COUNT(*) as NbTotalTacheEnAttente FROM taches WHERE statut='EN ATTENTE';";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    return $row["NbTotalTacheEnAttente"];
    mysqli_close($conn);

  }

  function getWaitingSpecificTasks($service){
    $conn=connectToBD();
    $sql = "SELECT COUNT(*) as NbTotalTacheEnAttente FROM taches WHERE statut='EN ATTENTE' AND type='$service';";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    return $row["NbTotalTacheEnAttente"];
    mysqli_close($conn);

  }

  function getAllTech(){
    $conn=connectToBD();
    $sql = "SELECT COUNT(*) as NbTotalTech FROM technicien ;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    return $row["NbTotalTech"];
    mysqli_close($conn);

  }

  function getInfoTech($service){
    $conn=connectToBD();
    $sql = "SELECT * FROM technicien WHERE service='$service';";
    $result = mysqli_query($conn, $sql);

    return $result;
    mysqli_close($conn);

  }

  function getAllSpecificTech($service){
    $conn=connectToBD();
    $sql = "SELECT COUNT(*) as NbTotalTech FROM technicien WHERE service='$service';";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    return $row["NbTotalTech"];
    mysqli_close($conn);

  }

  function getTech($idUser)
  {
    $conn=connectToBD();
    $sql = "SELECT * FROM technicien WHERE idTechnicien='$idUser';";
    $result = mysqli_query($conn,$sql); 
    if ($result) {
      $row=mysqli_fetch_row($result);
      return $row;
    } 
    else {
      echo "<script>alert(erreur de requete : $conn->error)</script>";
    }
      
  }

  function getTitre($idUser){
    $conn=connectToBD();
    $sql = "SELECT  titre,service FROM technicien WHERE idTechnicien='$idUser';";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    return $row;
    mysqli_close($conn);

  }

  function getPole(){
    $conn=connectToBD();
    $sql = "SELECT  * FROM pole WHERE nomPole!='ALL';";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    if(!$result){
      echo mysqli_error($conn);
    }
    echo $row["nomPole"];

    return $row;
    mysqli_close($conn);

  }

  function updateTachesEnCours($idUser,$ref){
    $conn=connectToBD();
    $sql = "UPDATE taches SET statut='EN COURS',idtech='$idUser',delai=1 WHERE ref=$ref";
    $result = mysqli_query($conn, $sql);

    if(!$result){
      echo mysqli_error($conn);
    }

    return $result;
    mysqli_close($conn);
  }

  function updateTachesEnAttente($service,$ref){
    $conn=connectToBD();

    $sql = "UPDATE taches SET statut='EN ATTENTE',type='$service',delai=1 WHERE ref=$currentref";
    $result = mysqli_query($conn, $sql);

    if(!$result){
      echo mysqli_error($conn);
    }

    return $result;
    mysqli_close($conn);
  }



?>