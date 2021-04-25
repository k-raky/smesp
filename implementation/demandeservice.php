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

$query = "SELECT * FROM taches where idtech=2 limit 20";
$result = mysqli_query($conn,$query); 
if ($result) {
 // echo "<script>alert('ok')</script>";
} 
else {
  echo "<script>alert(erreur de requete : $conn->error)</script>";
}

function getinfos($conn,$ref){
    $query2 = "SELECT * FROM taches where ref=$ref";
    $result2 = mysqli_query($conn,$query2); 
    if ($result2) {
        $row2= mysqli_fetch_row($result2);
        return $row2;
    } 
    else {
      echo "<script>alert(erreur de requete : $conn->error)</script>";
    }
}

function suspendre($ref,$motif,$conn){
  $query3 = "update taches set statut='suspendue',motifsuspension=$motif where ref=$ref";
    $result3 = mysqli_query($conn,$query3); 
    if ($result3) {
      echo "<script>alert('tache suspendue')</script>";
    } 
    else {
      echo "<script>alert(erreur de requete : $conn->error)</script>";
    }
  }


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Demande Technicien</title>
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

        .container{
            width: 85%;
            height: fit-content;
            margin-top: 10%;
            margin-bottom: 10%;
            padding: 0 5% 0 5%;
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

        function change(delai,ref,statut,button){

          if (delai>4 && statut=="en cours")
          {
            document.getElementById(ref).style.color='red';
            document.getElementById(button).style.backgroundColor='red';
          }
          if (statut=="ok") {
            document.getElementById(ref).style.color='green';
          }
          if (statut=="suspendue") {
            document.getElementById(ref).style.color='orange';
          }
          if (statut=="en cours") {
            document.getElementById(button).style.visibility="visible";
          }
        }
        
        var row2;

        function statut(statut,ref){
          if (statut=="ok") {
            $('#modalok').modal('show');
          }
          if (statut=="suspendue") {
            $('#modalsuspendue').modal('show');
          }

        }
        
    </script>


      <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: white;">
        <i class="fas fa-tools fa-2x x-5" style="color: #f4900c;"></i>
           <a class="navbar-brand" href="#accueil.html">SMESP</a>
       </nav>
   
          <div class="container bg-light d-flex flex-column align-items-center align-self-center">

            <h1 class="titre m-5">LES DEMANDES</h1>
          
          <div>
            <table class="table">
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
                    <th scope="col">Statut</th>
                    <th scope="col">Delai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while($row = mysqli_fetch_assoc($result)){
                    $button="button".$row['ref']."";
                    $ref=$row['ref'];
                    $delai=$row['delai'];
                    $statut=$row['statut'];
                    echo "<tr id='$ref'><th scope='row'>".$row['ref']."</th>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['nom']."</td>";
                    echo "<td>".$row['contact']."</td>";
                    echo "<td>".$row['fonction']."</td>";
                    echo "<td>".$row['type']."</td>";
                    echo "<td>".$row['cause']."</td>";
                    echo "<td>".$row['departement']."</td>";
                    echo "<td class='statut' onclick='statut(\"$statut\",$ref);'>".$row['statut']."</td>";
                    echo "<td>".$row['delai']."</td>";
                    echo "<td><button class='btn-info btn-lg' id='$button' data-toggle='modal' data-target='#modalupdate' style='visibility:hidden;'>mettre a jour</button></td></tr>";
                    echo "<script> change($delai,$ref,'$statut','$button');</script>";
                    }
                  ?>
                  
                </tbody>
              </table>
          </div>
        </div>

    <div class="modal fade" id="modalupdate">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
          <div class="modal-body m-5 d-flex align-items-center justify-content-around">
            <button type="button" class="btn" style="background-color: #f4900c;color:white" data-dismiss='modal'>Valider la tache</button>
            <button type="button" class="btn" style="background-color: #f4900c;color:white" data-toggle='modal' data-target='#modalsuspendre' data-dismiss='modal'>Suspendre la tache</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalsuspendre" >
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
          <div class="modal-body p-5 d-flex flex-column align-items-center">
          <h3 class="modal-title">Motif de la suspension</h5>
              <input class="m-3" type="text" name="motif" id="motif">
            <button type="button" class="btn" style="background-color: #f4900c;color:white" data-dismiss='modal'>Valider</button>
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
                <tr>
                <td>Ref</td>
                    <td scope="col">Date</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">Fonction</td>
                    <td scope="col">Type</td>
                    <td scope="col">Cause</td>
                    <td scope="col">Departement</td>
                    <td scope="col">Statut</td>
                    <td scope="col">Delai</td>
                </tr>
              </thead>
              <tbody>
              <?php
                    echo "<tr class='font-weight-bold'>";
                    foreach($row2 as $value) {
                      echo "<td>$value</td>";
                    }
                    echo "</tr>";
                  ?>
              </tbody>
            </table>
            </div>
            <div>
            <p class="font-weight-bold">Technicien en charge</p>
            <table class="table">
              <thead>
                <tr>
                <td scope="col">Id</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">service</td>
                    <td scope="col">Statut</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            </div>
            <div>
            <p class="font-weight-bold">Motif de suspension</p>
            </div>
            <button type="button" class="btn" style="background-color: #f4900c;color:white">rependre la tache</button>
            <button type="button" class="btn" style="background-color: #f4900c;color:white" data-dismiss="modal">ok</button>
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
                <tr>
                <td scope="col">Ref</td>
                    <td scope="col">Date</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">Fonction</td>
                    <td scope="col">Type</td>
                    <td scope="col">Cause</td>
                    <td scope="col">Departement</td>
                    <td scope="col">Statut</td>
                    <td scope="col">Delai</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            </div>
            <div>
            <p class="font-weight-bold">Technicien en charge</p>
            <table class="table">
              <thead>
                <tr>
                <td scope="col">Id</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Contact</td>
                    <td scope="col">service</td>
                    <td scope="col">Statut</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            </div>
            <button type="button" class="btn" style="background-color: #f4900c;color:white" data-dismiss="modal">ok</button>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>