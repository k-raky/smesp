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


if(isset($_POST['suspendre'])){ 

    global $conn;

    $motif=$_POST['motif'];
    $refsus=$_POST['refsus'];  

    $query3 = "update taches set statut='suspendue',motifsuspension='$motif' where ref=$refsus";
    $result3 = mysqli_query($conn,$query3); 
    if ($result3) {
      echo "<script>alert('tache suspendue')</script>";
      echo "<script>location.href='demandetech.php';</script>";
    } 
    else {
      echo "<script>alert(erreur de requete : $conn->error)</script>";
    }
    unset($_POST);

}

if(isset($_POST['reprendre'])){ 

  global $conn;
  $refrep=$_POST['refrep'];  

  $query4 = "update taches set statut='en cours',motifsuspension=NULL where ref=$refrep;";
  $result4 = mysqli_query($conn,$query4); 
  if ($result4) {
    echo "<script>alert('tache reprise')</script>";
    echo "<script>location.href='demandetech.php';</script>";
  } 
  else {
    echo "<script>alert(erreur de requete : $conn->error)</script>";
  }
  unset($_POST);

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

        .container-fluid{
            width: 90%;
            height: fit-content;
            margin-top: 10%;
            margin-bottom: 10%;
            padding: 0 5% 5% 5%;
            display: flex;
            align-items: center;
            align-self: center;
            flex-direction: column;
        }
        tr{
          margin-top: 25px;
          margin-bottom: 25px;
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


        function change(delai,ref,statut,button,check){

          if (delai>4)
          {
            document.getElementById(ref).style.color='red';
            document.getElementById(button).style.backgroundColor='red';
          }
          if (statut=="ok") {
            document.getElementById(ref).style.color='green';
            document.getElementById(check).style.visibility="visible";

          }
          if (statut=="suspendue") {
            document.getElementById(ref).style.color='orange';
          }
          if (statut=="en cours") {
            document.getElementById(button).style.visibility="visible";
          }
        }
      

        function statut(statut,ref){
          if (statut=="ok") {
            $('#modalok').modal('show');
          }
          if (statut=="suspendue") {
            $('#modalsuspendue').modal('show');
          }
        }


        function getref(ref){
            document.getElementById('refsus').value=ref;
        }

        function infos(ref,date,nom,contact,fonction,type,cause,depart,statut,delai,motif){
          document.getElementById("refinfos").innerText=ref;
          document.getElementById("date").innerText=date;
          document.getElementById("nom").innerText=nom;
          document.getElementById("contact").innerText=contact;
          document.getElementById("fonction").innerText=fonction;
          document.getElementById("type").innerText=type;
          document.getElementById("cause").innerText=cause;
          document.getElementById("depart").innerText=depart;
          document.getElementById("statut").innerText=statut;
          document.getElementById("delai").innerText=delai;
          document.getElementById("motifsuspension").innerText=motif;
          document.getElementById("refrep").value=ref;

        }
       
        
    </script>


      <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: white;">
        <i class="fas fa-tools fa-2x x-5" style="color: #f4900c;"></i>
           <a class="navbar-brand" href="#accueil.html">SMESP</a>
       </nav>
   
          <div class="container-fluid bg-light">

          <input type="search" name="search" id="search" placeholder="rechercher" class="d-flex align-self-end border-info m-2">

            <h1 class="titre m-5">LES DEMANDES</h1>
          
          <div>
            <table class="table table-borderless" id="table" style="font-size:large;" >
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
                    $check="check".$row['ref']."";
                    $ref=$row['ref'];
                    $date=$row['date'];
                    $nom=$row['nom'];
                    $contact=$row['contact'];
                    $fonction=$row['fonction'];
                    $type=$row['type'];
                    $cause=$row['cause'];
                    $depart=$row['departement'];
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
                    echo "<td class='statut' onclick='statut(\"$statut\");infos($ref,\"$date\",\"$nom\",$contact,\"$fonction\",\"$type\",\"$cause\",\"$depart\",\"$statut\",$delai,\"$motif\");'>$statut</td>";
                    echo "<td>$delai</td>";
                    echo "<td>
                            <i class='fas fa-check' id=$check style='visibility:hidden;'></i>
                            <button class='btn-info btn-lg' id='$button' data-toggle='modal' data-target='#modalupdate' style='visibility:hidden;font-size:small' onclick='getref($ref);'>mettre a jour</button>
                          </td></tr>";
                    echo "<script> change($delai,$ref,'$statut','$button','$check');</script>";
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

    <div class="modal fade" id="modalsuspendre">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
          <div class="modal-body p-5 ">
            <form action="#" class="form d-flex flex-column align-items-center" id="form" method="post">
              <h3 class="modal-title m-3">Motif de la suspension</h5>
              <div>
                  <label for="refsus" class="col-sm-2 col-form-label text-info">Ref</label>
                  <input type="text" readonly class="m-3" id="refsus" name="refsus">
              </div>
              <div>
                 <label for="motif" class="col-sm-2 col-form-label text-info">Motif</label>
                <input type="text" class="m-3" id="motif" name="motif">
              </div>
              <button type="submit" name="suspendre" style="background-color: #f4900c;color:white;width:30%; margin-top : 10px;" >Valider</button>
            </form>
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
                    <td scope="col">Statut</td>
                    <td scope="col">Delai</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="refinfos"></td>
                  <td id="date"></td>
                  <td id="nom"></td>
                  <td id="contact"></td>
                  <td id="fonction"></td>
                  <td id="type"></td>
                  <td id="cause"></td>
                  <td id="depart"></td>
                  <td id="statut"></td>
                  <td id="delai"></td>
                </tr>
              </tbody>
            </table>
            </div>
            
            <div class="d-flex">
            <p class="font-weight-bold">Motif de suspension  : </p>
            <p id="motifsuspension" class="text-danger" style="margin-left: 15px;"></p>
            </div>

            <div class="d-flex justify-content-center">
              <form action="#" method="post">
                <input type="hidden" name="refrep" id="refrep">
                <button type="submit" name="reprendre" class="btn" style="background-color: #f4900c;color:white;margin : 15px;">rependre la tache</button>
              </form>
            <button type="button" class="btn" style="background-color: #f4900c;color:white;margin : 15px;" data-dismiss="modal">ok</button>
            </div>

          </div>
        </div>
      </div>
    </div>

  </body>
</html>