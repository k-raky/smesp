<?php

  function connectToBD(){
    $servername = "localhost";
    $username = "sira";
    $password = "passer";
    $dbname = "maintenance";

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
    }
    if(!empty($row['fonction'])){
      $fonction=$row['fonction'];
    }

    mysqli_close($conn);
    
    return $fonction;
  }


  function addTask($idUser,$contact,$typeDefaillance,$priorite,$cause,$message){
    $conn=connectToBD();
    $ref= date("Ymd:His");
    $sql="INSERT INTO Tasks (ref,idDemandeur,contact,priorite,typeDefaillance,cause,message) VALUES ('".$ref."','".$idUser."','".$contact."','".$priorite."','".$typeDefaillance."','".$cause."','".$message."');";
    
    mysqli_query($conn,$sql);
    
    mysqli_close($conn);
  }

  function getTasks($idUser){
    $conn=connectToBD();
    $sql = "SELECT * FROM Tasks WHERE idDemandeur='".$idUser."';";
    $result = mysqli_query($conn, $sql);
    // $row=mysqli_fetch_assoc($result);

    mysqli_close($conn);
    
    return $result;
  }
?>