<!doctype html>
<html lang="en">
  <head>
    <title>Demande Chef Maintenance</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Belleza' rel='stylesheet'>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- DATA LISTS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

  </head>
 
  <body>       
    <div class="container-fluid">
    <!-- <?php 
  
      //STOCKER LES VARIABLES EN FONCTIONS DE LA PERSONNE CONNECTÉE
      $titre=$_SESSION['titre'];

      $service=$_SESSION['service'];

      switch ($titre) {

        case "CHEF SUPREME":
          $AllTasks=getAllTasks();
          break;


        case "CHEF DE POLE":
          $AllTasks=getSpecificTasks($service);
          break;

        case "AUCUN":
          break;
        
        default:
          break;
      }

    ?> -->

      <h2 class="card-title mt-5">Tâches</h2>

      <div class="card mt-4">
        <div class="card-body">
          <div class="table-responsive">
            <?php
              if (mysqli_num_rows($AllTasks) > 0) {

            ?>
            <table id="allTasks" class="row-border hover" data-page-length='10' style="width:100%" >
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
                while($row = mysqli_fetch_assoc($AllTasks)){
                  $idtech=$row['idtech'];
                  $rowtech=getTech($idtech);
                  $idtech2=$rowtech[0];
                  $nomtech=$rowtech[5]." ".$rowtech[1];
                  $contacttech=$rowtech[2];
                  $servicetech=$rowtech[3];
                  $dispo=$rowtech[4];

                  $button1="button1".$row['ref']."";
                  $button2="button2".$row['ref']."";
                  $button3="button3".$row['ref']."";
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
                  $message=$row['message'];
                  echo "<tr id='$ref'><th scope='row'>$ref</unset($_POST);th>";
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
                          
                          <button class='btn-info btn-lg' id='$button1' data-toggle='modal' data-target='#modalattribuer' style='visibility:hidden;font-size:small' 
                          onclick='getref($ref,\"$nom\",\"$type\",\"$cause\",\"$priorite\",\"$message\");'>attribuer</button>
                          <button class='btn-light btn-lg' id='$button2' style='visibility:hidden;font-size:small' onclick='voirfiche($ref);'>voir la fiche</button>
                          <button class='btn-info btn-lg' id='$button3' data-toggle='modal' data-target='#modalattribuerTech' style='visibility:hidden;font-size:small' onclick='getrefService($ref);'>attribuer</button>

                          </td></tr>";
                  echo "<script>change($delai,$ref,\"$statut\",\"$button1\",\"$type\",\"$button2\",\"$button3\");</script>";
                  
                  
                  
                  // <button class='btn-info btn-lg' id='$button3' data-toggle='modal' data-target='#modalattribuerTech' style='visibility:hidden;font-size:small' onclick='getrefService($ref,\"$nom\",\"$type\",\"$cause\",\"$priorite\",\"$message\");'>attribuer</button>

                }
                ?>
                </tbody>
              </table>
              

              <?php } ?>
          </div>
        </div>


    <div class="modal fade" id="modalattribuer">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body p-5">

          <div>
            <p class="font-weight-bold">Informations sur la tache</p>
            <table class="table">
              <thead>
                <tr class="text-info">
                    <td>Ref</td>
                    <td scope="col">Nom</td>
                    <td scope="col">Type</td>
                    <td scope="col">Cause</td>
                    <td scope="col">Priorite</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="currentref1"></td>
                  <td id="nomautre"></td>
                  <td id="typeautre"></td>
                  <td id="causeautre"></td>
                  <td id="prioautre"></td>
                </tr>
              </tbody>
            </table>

            <div class="d-flex">
            <p class="font-weight-bold">Message  : </p>
            <p id="message" class="text-danger" style="margin-left: 15px;"></p>
            </div>

            </div>
            <form action="#" class="form d-flex flex-column align-items-center justify-content-between" id="form" method="post">
              <div class="form-group">
              <input type="hidden" name="currentref" id="currentref2">
                <select class="form-control form-control-lg" name="service" id="service">
                  <option selected>Selectionner un service</option>
                  <option value="Menuiserie">- service menuiserie</option>
                  <option value="Plomberie">- service plomberie</option>
                  <option value="Electricite">- service electricite</option>
                  <option value="Maçonnerie">- service maconnerie</option>
                  <option value="Climatiseur">- climatiseur</option>
                  <option value="Video Projecteur">- video projecteur</option>
                </select>
              </div>
              <button class="btn btn-sm" type="submit" name="attribuer" style="background-color: #f4900c;color:white;width:30%; margin-top : 10px;" >Valider</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="modalattribuerTech">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body p-5">
            <form action="#" class="form d-flex flex-column align-items-center justify-content-between" id="form" method="post">
              <div class="form-group">
              <input type="text" name="currentref" id="currentref">
                <select class="form-control form-control-lg" name="idtech" id="idtech">
                  <option selected>Selectionner un technicien</option>
                    <?php
                      $result=getInfoTech($service);
                      while($row = mysqli_fetch_assoc($result)){
                        $id=$row['idTechnicien'];
                        $nomtech=$row['prenom']." ".$row2['nom'];
                        $contacttech=$row['contact'];
                        $statuttech=$row['statut'];
                        echo "<option value=$id>
                                $nomtech &emsp;|&emsp; $contacttech &emsp;|&emsp; $statuttech
                                </option>";
                      }
                    ?>
                </select>
              </div>
              <button type="submit" name="attribuerTech" style="background-color: #f4900c;color:white;width:30%; margin-top : 10px;" >Valider</button>
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
    <script>
      $(document).ready(function(){
        $("#allTasks").DataTable({
          paging:true,
          scrollY:false,
        });
      })
      
    </script>
    

  </body>
</html>