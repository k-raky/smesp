<?php
$servername = "bejunitqknwdzbyfqz0y-mysql.services.clever-cloud.com";
$username = "ulsartcj6ukxsuwr";
$password = "fYEPeEbAu9sTiAzv276j";
$dbname = "bejunitqknwdzbyfqz0y";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "<script>alert(erreur de connexion : $conn->connect_error)</script>";
}
//else echo "<script>alert('success')</script>";

$query = "SELECT * FROM taches where type='Electricite'";
$result = mysqli_query($conn,$query); 
if ($result) {
 // echo "<script>alert('ok')</script>";
} 
else {
  echo "<script>alert(erreur de requete : $conn->error)</script>";
}

$query3 = "SELECT * FROM technicien where service='Electricite'";
$result3 = mysqli_query($conn,$query3); 
if ($result3) {
 // echo "<script>alert('ok')</script>";
} 
else {
  echo "<script>alert(erreur de requete : $conn->error)</script>";
}



if(isset($_POST['attribuer'])){ 
    global $conn;

    echo "<script>alert('isset attribuer')</script>";

    $currentref=$_POST['currentref'];
    $idtechnicien=$_POST['idtech']; 

    echo "<script>alert('$idtechnicien $currentref')</script>";

    $query2 = "update taches set statut='EN COURS',idtech='$idtechnicien',delai=1 where ref=$currentref";
    $result2 = mysqli_query($conn,$query2); 
    if ($result2) {
      echo "<script>alert('Tache attribuee au technicien $idtechnicien')</script>";
      echo "<script>location.href='demandeservice.php';</script>";
    } 
    else {
      echo "<script>alert(erreur de requete : $conn->error)</script>";
    }
    unset($_POST);

}

function getTech($id)
{
  global $conn;

    $query4 = "select * from technicien where idTechnicien='$id'";
    $result4 = mysqli_query($conn,$query4); 
    if ($result4) {
      $row4=mysqli_fetch_row($result4);
      return $row4;

      echo "<script>alert('get tech')</script>";
    } 
    else {
      echo "<script>alert(erreur de requete : $conn->error)</script>";
    }
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Demande Chef de Service</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Belleza' rel='stylesheet'>
    
    <style>
        body{
            background-color: #3c95a8;
            background-image: url("images/repair.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode:overlay;
            width: 100%;
            height: fit-content;
            display: flex;
            justify-content: center;
        }
        .navbar .navbar-brand,.titre{
            font-size:xx-large;
            color: #3c95a8;
            font-family: 'Belleza';
            margin-left: 10px;
        }
        .statut{
          cursor: pointer;
        }

        .container-fluid{
            width: 90%;
            height: fit-content;
            margin-top: 10%;
            margin-bottom: 10%;
            display: flex;
            align-items: center;
            align-self: center;
            flex-direction: column;
        }
        tr{
          margin-top: 25px;
          margin-bottom: 25px;
        }
        .form-control{
          line-height: 100px; 
        }
        table{
            text-align: center;
        }
       
    </style>
</head>
 
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    


    <script type="text/javascript">

        $(document).ready(function(){
          $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });


        function change(delai,ref,statut,button1,type,button2){
          if (delai>4)
          {
            document.getElementById(ref).style.color='red';
            document.getElementById(button1).style.backgroundColor='red';
          }
          if (statut=="TERMINÉE") {
            document.getElementById(ref).style.color='green';
            document.getElementById(button2).style.visibility="visible";

          }
          if (statut=="SUSPENDUE") {
            document.getElementById(ref).style.color='orange';
          }
          if (statut=="EN ATTENTE") {
            document.getElementById(button1).style.visibility="visible";
          }
        }
      

        function statut(statut){
         
          if (statut=="SUSPENDUE") {
            $('#modalsuspendue').modal('show');
          }
          if (statut=="EN COURS") {
            $('#modalencours').modal('show');
          }
        }

        function voirfiche(ref){
          location.href="ficheremplie.php?refremplie="+ref;
        }

        function getref(ref){
            document.getElementById('currentref').value=ref;
        }

        function infos(ref,date,nom,contact,fonction,type,cause,depart,priorite,statut,delai,motif,idtech,nomtech,contacttech,servicetech,dispo){
          if (statut=="EN COURS") {     
            document.getElementById("refinfos1").innerText=ref;
            document.getElementById("date1").innerText=date;
            document.getElementById("nom1").innerText=nom;
            document.getElementById("contact1").innerText=contact;
            document.getElementById("fonction1").innerText=fonction;
            document.getElementById("type1").innerText=type;
            document.getElementById("cause1").innerText=cause;
            document.getElementById("depart1").innerText=depart;
            document.getElementById("prio1").innerText=priorite;
            document.getElementById("statut1").innerText=statut;
            document.getElementById("delai1").innerText=delai; 
            
            document.getElementById("id1").innerText=idtech;
            document.getElementById("nomtech1").innerText=nomtech;
            document.getElementById("contacttech1").innerText=contacttech;
            document.getElementById("servicetech1").innerText=servicetech;
            document.getElementById("dispo1").innerText=dispo;
            
            
          }
          if (statut=="SUSPENDUE") {     
            document.getElementById("refinfos2").innerText=ref;
            document.getElementById("date2").innerText=date;
            document.getElementById("nom2").innerText=nom;
            document.getElementById("contact2").innerText=contact;
            document.getElementById("fonction2").innerText=fonction;
            document.getElementById("type2").innerText=type;
            document.getElementById("cause2").innerText=cause;
            document.getElementById("depart2").innerText=depart;
            document.getElementById("prio2").innerText=priorite;
            document.getElementById("statut2").innerText=statut;
            document.getElementById("delai2").innerText=delai;
            document.getElementById("motifsuspension2").innerText=motif;
            
            document.getElementById("id2").innerText=idtech;
            document.getElementById("nomtech2").innerText=nomtech;
            document.getElementById("contacttech2").innerText=contacttech;
            document.getElementById("servicetech2").innerText=servicetech;
            document.getElementById("dispo2").innerText=dispo;
          }
        }
       
        
    </script>


      <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: white;">
        <i class="fas fa-tools fa-2x x-5" style="color: #f4900c;"></i>
           <a class="navbar-brand" href="#accueil.html">SMESP</a>
       </nav>
   
          <div class="container-fluid bg-light">

          <input type="search" name="search" id="search" placeholder="rechercher" class="d-flex align-self-end border-info m-3">

            <h1 class="titre m-5">LES DEMANDES</h1>
          
          <div>
            <table class="table table-borderless" id="table">
                <thead>
                  <tr>
                    <th scope="col">Ref</th>
                    <th scope="col">Date</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">Type</th>
                    <th scope="col">Cause</th>
                    <th scope="col">Departement</th>
                    <th scope="col">Priorite</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Durée</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while($row = mysqli_fetch_assoc($result)){
                    $idtech=$row['idtech'];
                    $rowtech=getTech($idtech);
                    $idtech2=$rowtech[0];
                    $nomtech=$rowtech[5]." ".$rowtech[1];
                    $contacttech=$rowtech[2];
                    $servicetech=$rowtech[3];
                    $dispo=$rowtech[4];

                    $button1="button1".$row['ref']."";
                    $button2="button2".$row['ref']."";
                    $ref=$row['ref'];
                    $date=$row['date'];
                    $nom=$row['nom'];
                    $contact=$row['contact'];
                    $fonction=$row['fonction'];
                    $type=$row['type'];
                    $cause=$row['cause'];
                    $depart=$row['departement'];
                    $priorite=$row['priorite'];
                    $statut=$row['statut'];
                    $delai=$row['delai'];
                    $motif=$row['motifsuspension'];
                    echo "<tr id='$ref'><th scope='row'>$ref</th>";
                    echo "<td>$date</td>";
                    echo "<td>$nom</td>";
                    echo "<td>$contact</td>";
                    echo "<td>$fonction</td>";
                    echo "<td>$type</td>";
                    echo "<td>$cause</td>";
                    echo "<td>$depart</td>";
                    echo "<td>$priorite</td>";
                    echo "<td class='statut' 
                              onclick='statut(\"$statut\");
                              infos($ref,\"$date\",\"$nom\",$contact,\"$fonction\",\"$type\",\"$cause\",\"$depart\",\"$priorite\",\"$statut\",$delai,\"$motif\",
                              \"$idtech2\",\"$nomtech\",\"$contacttech\",\"$servicetech\",\"$dispo\");'>$statut</td>";
                    echo "<td>$delai</td>";
                    echo "<td class='d-flex flex-column'>
                            <button class='btn-info btn-lg' id='$button1' data-toggle='modal' data-target='#modalattribuer' style='visibility:hidden;font-size:small' onclick='getref($ref);'>attribuer</button>
                            <button class='btn-light btn-lg' id='$button2' style='visibility:hidden;font-size:small' onclick='voirfiche($ref);'>voir la fiche</button>
                            </td></tr>";
                    echo "<script>change($delai,$ref,\"$statut\",\"$button1\",\"$type\",\"$button2\");</script>";
                    }
                  ?>
                  
                </tbody>
              </table>
          </div>
        </div>


    <div class="modal fade" id="modalattribuer">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body p-5">
            <form action="#" class="form d-flex flex-column align-items-center justify-content-between" id="form" method="post">
              <div class="form-group">
              <input type="text" name="currentref" id="currentref">
                <select class="form-control form-control-lg" name="idtech" id="idtech">
                  <option selected>Selectionner un technicien</option>
                    <?php
                      while($row2 = mysqli_fetch_assoc($result3)){
                        $id=$row2['idTechnicien'];
                        $nomtech=$row2['prenom']." ".$row2['nom'];
                        $contacttech=$row2['contact'];
                        $statuttech=$row2['statut'];
                        echo "<option value=$id>
                                $nomtech &emsp;|&emsp; $contacttech &emsp;|&emsp; $statuttech
                                </option>";
                      }
                    ?>
                </select>
              </div>
              <button type="submit" name="attribuer" style="background-color: #f4900c;color:white;width:30%; margin-top : 10px;" >Valider</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modalencours" >
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body">
          <div>
            <p class="font-weight-bold">Informations sur la tache</p>
            <table class="table">
              <thead>
                <tr class="text-info">
                    <td>Ref</td>
                    <td scope="col">Date</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">Fonction</td>
                    <td scope="col">Type</td>
                    <td scope="col">Cause</td>
                    <td scope="col">Departement</td>
                    <td scope="col">Priorite</td>
                    <td scope="col">Statut</td>
                    <td scope="col">Durée</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="refinfos1"></td>
                  <td id="date1"></td>
                  <td id="nom1"></td>
                  <td id="contact1"></td>
                  <td id="fonction1"></td>
                  <td id="type1"></td>
                  <td id="cause1"></td>
                  <td id="depart1"></td>
                  <td id="prio1"></td>
                  <td id="statut1"></td>
                  <td id="delai1"></td>
                </tr>
              </tbody>
            </table>
            </div>

            <div>
            <p class="font-weight-bold">Technicien en charge</p>
            <table class="table">
              <thead>
                <tr class="text-info">
                <td scope="col">Id</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">Service</td>
                    <td scope="col">Statut</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="id1"></td>
                  <td id="nomtech1"></td>
                  <td id="contacttech1"></td>
                  <td id="servicetech1"></td>
                  <td id="dispo1"></td>
                </tr>
              </tbody>
            </table>
            </div>
            
            <div class="d-flex justify-content-center">
            <button type="button" class="btn" style="background-color: #f4900c;color:white;margin : 15px;" data-dismiss="modal">ok</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalsuspendue" >
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body">
          <div>
            <p class="font-weight-bold">Informations sur la tache</p>
            <table class="table">
              <thead>
                <tr class="text-info">
                    <td>Ref</td>
                    <td scope="col">Date</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">Fonction</td>
                    <td scope="col">Type</td>
                    <td scope="col">Cause</td>
                    <td scope="col">Departement</td>
                    <td scope="col">Priorite</td>
                    <td scope="col">Statut</td>
                    <td scope="col">Durée</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="refinfos2"></td>
                  <td id="date2"></td>
                  <td id="nom2"></td>
                  <td id="contact2"></td>
                  <td id="fonction2"></td>
                  <td id="type2"></td>
                  <td id="cause2"></td>
                  <td id="depart2"></td>
                  <td id="prio2"></td>
                  <td id="statut2"></td>
                  <td id="delai2"></td>
                </tr>
              </tbody>
            </table>
            </div>

            <div>
            <p class="font-weight-bold">Technicien en charge</p>
            <table class="table">
              <thead>
                <tr class="text-info">
                <td scope="col">Id</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">service</td>
                    <td scope="col">Statut</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="id2"></td>
                  <td id="nomtech2"></td>
                  <td id="contacttech2"></td>
                  <td id="servicetech2"></td>
                  <td id="dispo2"></td>
                </tr>
              </tbody>
            </table>
            </div>
            
            
            <div class="d-flex">
            <p class="font-weight-bold">Motif de suspension  : </p>
            <p id="motifsuspension2" class="text-danger" style="margin-left: 15px;"></p>
            </div>

            <div class="d-flex justify-content-center">
            <button type="button" class="btn" name="reprendre" style="background-color: #f4900c;color:white;margin : 15px;" data-dismiss="modal">ok</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    

  </body>
</html>