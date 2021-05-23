<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <div>           
  
            <table class="table table-borderless" id="table" >
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

                        $result=getTaches();

                        while($row = mysqli_fetch_assoc($result)){
                            $statut=$row['statut'];

                            if ($statut=="EN COURS") {
                                
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
                            echo "<script>change($delai,$ref,\"$statut\",\"$button1\",\"$type\",\"$button2\");</script>";
                            }
                            
                        }
                    ?>
                </tbody>
            </table>
             </div>
            

  </body>
</html>
