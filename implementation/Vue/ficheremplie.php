<?php
$servername = "localhost";
$username = "id16887712_diabi";
$password = "Sm-database-123";
$dbname = "id16887712_smesp";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "<script>alert(erreur de connexion : $conn->connect_error)</script>";
}
//else echo "<script>alert('success')</script>";


    if (isset($_GET['refremplie'])) {
       
        $ref=$_GET['refremplie'];
    
        $query1 = "SELECT * FROM taches where ref=$ref";
        $result1 = mysqli_query($conn,$query1); 
        if ($result1) {
        $row1=mysqli_fetch_assoc($result1);
        // echo "<script>alert('ok')</script>";
        } 
        else {
        echo "<script>alert(erreur de requete : $conn->error)</script>";
        }

        $query2 = "SELECT * FROM fiche where reftache=$ref";
        $result2 = mysqli_query($conn,$query2); 
        if ($result2) {
        $row2=mysqli_fetch_assoc($result2);
        // echo "<script>alert('ok')</script>";
        } 
        else {
        echo "<script>alert(erreur de requete : $conn->error)</script>";
        }

        $query3 = "SELECT * FROM materielutilise where reftache=$ref";
        $result3 = mysqli_query($conn,$query3); 
        if ($result3) {
        // echo "<script>alert('ok')</script>";
        } 
        else {
        echo "<script>alert(erreur de requete : $conn->error)</script>";
        }

        $query4 = "SELECT * FROM intervenants where reftache=$ref";
        $result4 = mysqli_query($conn,$query4); 
        if ($result4) {
        // echo "<script>alert('ok')</script>";
        } 
        else {
        echo "<script>alert(erreur de requete : $conn->error)</script>";
        }


    }
    else 
        echo "<script>alert('erreur')</script>";


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Fiche d'Intervention</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
        body{
            width: 100%;
            padding: 5% 10% 5% 10%;
            height: fit-content;
            display: flex;
            align-self: center;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
       
        thead{
            color: #3c95a8;
            background-color: #dcdcdc;
        }
        label{
            font-weight: bold;
            color: #3c95a8;
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
 
   
 
                    <div class=" container-fluid d-flex justify-content-between">
                        <img src="../../Public/img/logo.png" width="150px" height="150px"/>
                        <p><strong><?php echo $row2['datefiche'] ?></strong></p>
                    </div>

                    <h2 class=" m-5">Fiche d'Intervention N° <?php echo $row2['numero'] ?></h2>       


                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Demandeur</th>
                                    <th>Contact</th>
                                    <th>Fonction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <?php echo $row1['ref'] ?></td>
                                    <td id="nomremplie"> <?php echo $row1['nom'] ?></td>
                                    <td id="contactremplie"><?php echo $row1['contact'] ?></td>
                                    <td id="fonctionremplie"><?php echo $row1['fonction'] ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Type de maintenance</th>
                                    <th>Type de defaillance</th>
                                    <th>Priorite</th>
                                    <th>Cause de la defaillance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="typemaintremplie"><?php echo $row2['typemaint'] ?></td>
                                    <td id="typefailleremplie"><?php echo $row1['type'] ?></td>
                                    <td id="prioriteremplie"><?php echo $row1['priorite'] ?></td>
                                    <td id="causeremplie"><?php echo $row1['cause'] ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Intervenants</th>
                                    <th>Visa Demandeur</th>
                                    <th>Informations sur l'intervention</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                <?php
                                    while($row4 = mysqli_fetch_assoc($result4)){
                                        $nom=$row4['nom'];
                                        echo "<p>$nom</p>";
                                    }
                                    ?>
                                </td>

                                    <td id="visaremplie"><?php echo $row2['visa'] ?></td>

                                    <td >
                                        <div class="d-flex flex-column align-items-start" style="margin-left: 30%;"> 
                                            <p><strong class="text-info"> Date de l'Intervention : </strong>&ensp; <?php echo $row2['datetache'] ?></p>
                                            <p><strong class="text-info">Lieu de l'Intervention : </strong> &ensp; <?php echo $row2['lieu'] ?></p>
                                            <p><strong class="text-info">Duree de l'Intervention : </strong>&ensp; <?php echo $row2['duree'] ?>&nbsp;jours</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="m-3">
                            <h5>PIECES DE RECHANGES ET CONSOMMABLES</h5>
                        </div>


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Quantite</th>
                                    <th>Marque/Reference</th>
                                    <th>Designation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($row3 = mysqli_fetch_assoc($result3)){
                                    $quant=$row3['quantite'];
                                    $marque=$row3['marque'];
                                    $desi=$row3['designation'];
                                    echo "<tr><td>$quant</td>";
                                    echo "<td>$marque</td>";
                                    echo "<td>$desi</td></tr>";
                                }
                                    ?>
                            </tbody>
                        </table>


                <a href="javascript:history.back().reload()" class="btn btn-lg m-5 btn-info">ok</a>
  </body>
</html>

