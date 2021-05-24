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

    if ($type=="Autre") {
      $statut=NULL;
    }else $statut="EN ATTENTE";

    $sql="INSERT INTO taches (idDemandeur,nom,fonction,contact,type,departement,priorite,cause,message,statut) VALUES ('".$idUser."','".$name."','".$fonction."','".$contact."','".$type."','".$departement."','".$priorite."','".$cause."','".$message."','".$statut."');";
    
    $result=mysqli_query($conn,$sql);
    if (!$result) {
      echo mysqli_error($conn);
    }
    else echo "<script>alert('Demande enregistree');</script>";
    
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

  function getTechTasks($idUser){
    $conn=connectToBD();
    $sql = "SELECT * FROM taches WHERE idtech='$idUser';";
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
    $sql = "SELECT count(distinct ref) as nombreTaches from taches group by statut;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);

    return $row;
    mysqli_close($conn);

  }

  function getWaitingSpecificTasks($service){
    $conn=connectToBD();
    $sql = "SELECT count(distinct ref) as nombreTaches from taches group by statut where type='$service';";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);

    return $row;
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
      $row=mysqli_fetch_assoc($result);
      return $row;
    } 
    else {
      echo "<script>alert(erreur de requete : $conn->error)</script>";
    }
      
  }

  function getTitre($idUser){
    $conn=connectToBD();
    $sql = "SELECT  titre,service,nom,prenom FROM technicien WHERE idTechnicien='$idUser';";
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
    else echo "<script>alert('tache attribuee')</script>";

    return $result;
    mysqli_close($conn);
  }

  function updateTachesEnAttente($service,$ref){
    $conn=connectToBD();

    $sql = "UPDATE taches SET statut='EN ATTENTE',type='$service',delai=1 WHERE ref=$ref";
    $result = mysqli_query($conn, $sql);

    if(!$result){
      echo mysqli_error($conn);
    }
    else echo "<script>alert('tache attribuee')</script>";

    return $result;
    mysqli_close($conn);
  }

  function updateTachesSuspendu($motif,$refSus){
    $conn=connectToBD();

    $sql = "UPDATE taches SET statut='SUSPENDUE',motifsuspension='$motif' WHERE ref=$refSus";
    $result = mysqli_query($conn, $sql);

    if(!$result){
      echo mysqli_error($conn);
    }
    else echo "<script>alert('tache suspendue')</script>";


    return $result;
    mysqli_close($conn);
  }

  function updateTachesReprendre($refRep){
    $conn=connectToBD();

    $sql = "UPDATE taches SET statut='EN COURS',motifsuspension=NULL WHERE ref=$refRep;";
    $result = mysqli_query($conn, $sql);

    if(!$result){
      echo mysqli_error($conn);
    }
    else echo "<script>alert('tache reprise')</script>";


    return $result;
    mysqli_close($conn);
  }

  if(isset($_POST['attribuerService'])){ 
   
    $currentref=$_POST['currentref'];
    $service=$_POST['service']; 

    updateTachesEnAttente($service,$currentref);

    unset($_POST);

  }

  if(isset($_POST['attribuerTech'])){ 

    $currentref=$_POST['currentref'];
    $idtechnicien=$_POST['idtech']; 
    updateTachesEnCours($idtechnicien,$currentref);

    unset($_POST);

  }

  if(isset($_POST['suspendre'])){ 

    $motif=$_POST['motif'];
    $refsus=$_POST['refsus'];  

    updateTachesSuspendu($motif,$refsus);
    unset($_POST);

  }

  if(isset($_POST['reprendre'])){ 

    $refrep=$_POST['refrep'];  

    updateTachesReprendre($refrep);
    $result4 = mysqli_query($conn,$query4); 
    
    unset($_POST);

  }

  function materielutilise($ref,$quant,$marque,$desi,$nom)
        {
            $conn=connectToBD();
          
            $query4 = "insert into materielutilise(reftache,quantite,marque,designation) values ($ref,$quant,'$marque','$desi')";
            $result4 = mysqli_query($conn,$query4); 
            
            $query5 = "insert into intervenants(reftache,nom) values ($ref,'$nom')";
            $result5 = mysqli_query($conn,$query5); 
            
            if ($result4 && $result5) {
                $query6 = "update taches set statut='TERMINÉE' where ref=$ref";
                mysqli_query($conn,$query6);
            } 
            else {
            echo "<script>alert(erreur de requete : $conn->error)</script>";
            }

        }
    
    function addFiche($reftache,$datefiche,$typemaint,$visa,$datetache,$lieu,$duree){

        $conn=connectToBD();

        $query3 = "insert into fiche(reftache,datefiche,typemaint,visa,datetache,lieu,duree) values ($reftache,'$datefiche','$typemaint','$visa','$datetache','$lieu',$duree)";
        $result3 = mysqli_query($conn,$query3); 
          if ($result3) {
          echo "<script>alert('fiche enregistree')</script>";
          echo "<script>alert('tache terminee')</script>";
          } 
          else {
          echo "<script>alert(erreur de requete : $conn->error)</script>";
          }
    }

    if(isset($_POST['SubmitFiche'])){ 

        $reftache=$_POST["reftache"];
        $datefiche=date("Y-m-d");
        $typemaint=$_POST["typemaint"];
        $visa=$_POST["visa"]; 
        $datetache=$_POST["datetache"]; 
        $lieu=$_POST["lieu"]; 
        $duree=$_POST["dureetache"];
      
        addFiche($reftache,$datefiche,$typemaint,$visa,$datetache,$lieu,$duree);
 
        for ($i=1; $i<6 ; $i++) { 
          $quant=$_POST["quant".$i];
          $marque=$_POST["marque".$i];
          $desi=$_POST["design".$i];
          $nom=$_POST["interv".$i];

          materielutilise($reftache,$quant,$marque,$desi,$nom);
        }

      unset($_POST); 

    }
      



?>