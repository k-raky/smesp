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


if(isset($_POST['button'])){ 

  global $conn;

  $nom=$_POST["demandeur"]; 
  $contact=$_POST["contact"]; 
  $fonction=$_POST["fonction"]; 
  $typemaint=$_POST["typemaint"]; 
  $typefaille=$_POST["typefaille"]; 
  $priorite=$_POST["priorite"]; 
  $cause=$_POST["cause"]; 
  $inter=$_POST["intervenants"]; 
  $visa=$_POST["visa"]; 
  $date=$_POST["date"]; 
  $lieu=$_POST["lieu"]; 
  $duree=$_POST["duree"]; 
  $quant=$_POST["quantite"]; 
  $marque=$_POST["marque"];     
  $desi=$_POST["desi"]; 


    $query3 = "insert into fiche(demandeur,contact,fonction,typemaint,
    typefaille,priorite,cause,intervenants,visa,date,lieu,duree,quantite,
    marque,designation) values ('$nom',$contact,'$fonction','$typemaint','$typefaille','$priorite','$cause','$inter','$visa','$date','$lieu',
    '$duree','$quant','$marque','$desi')";
    $result3 = mysqli_query($conn,$query3); 
    if ($result3) {
     echo "<script>alert('ok')</script>";
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
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
         body{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-content: center;
            padding: 10%;
        }
        p{
            font-weight: bold;
        }
        thead{
            color: #3c95a8;
            background-color: #dcdcdc;
        }
        label{
            font-weight: bold;
            color: #3c95a8;
        }
        div{
            text-align: center;
        }
        input{
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
 
    <div class="d-flex justify-content-between">
        <img src="images/logoesp.png">
        <p>04/05/2021</p>
    </div>


    <div class=" m-5 ">
        <p>Fiche d'Intervention</p>
    </div>

      <form action="#" method="post">
        <div class="form-group">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Demandeur</th>
                        <th>Contact</th>
                        <th>Fonction</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="demandeur" id="demandeur"></td>
                        <td><input type="text" name="contact" id="contact"></td>
                        <td><input type="text" name="fonction" id="fonction"></td>
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
                        <td> 
                                <input type="radio" name="typemaint" id="corr" >
                                <label for="corr">Corrective</label>
                                <div></div>
                                <input type="radio" name="typemaint" id="prev" >
                                <label for="prev">Preventive</label>  
                        </td>
                        <td><input type="text" name="typefaille" id="typefaille"></td>
                        <td><input type="text" name="priorite" id="priorite"></td>
                        <td><input type="text" name="cause" id="cause"></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Intervenants</th>
                        <th>Visa Demandeur</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="d-flex flex-column">
                            <input type="text" name="interv1" id="interv1">
                            <input type="text" name="interv2" id="interv2">
                            <input type="text" name="interv3" id="interv3">
                            <input type="text" name="interv4" id="interv4">
                            <input type="text" name="interv5" id="interv5">
                        </td>

                        <td><textarea class="form-control" name="visa" id="visa" rows="5"></textarea></td>

                        <td class="d-flex justify-content-center align-items-center" >
                           <div class="d-flex flex-column align-items-end justify-content-evenly">
                           <label for="date">Date de l'Intervention</label>
                           <label for="lieu">Lieu de l'Intervention </label>
                           <label for="duree">Duree de l'Intervention </label>
                           </div>
                           <div class="d-flex flex-column align-items-start justify-content-evenly">
                           <input type="date" name="date" id="date">
                            <input type="text" name="lieu" id="lieu">
                            <input type="text" name="duree" id="duree">
                           </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div>
                 <p>PIECES DE RECHANGES ET CONSOMMABLES</p>
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
                    <tr>
                        <td>
                            <input type="text" name="quant1" id="quant1">
                            <input type="text" name="quant2" id="quant2">
                            <input type="text" name="quant3" id="quant3">
                            <input type="text" name="quant4" id="quant4">
                            <input type="text" name="quant5" id="quant5">
                        </td>
                        <td>
                            <input type="text" name="ref1" id="ref1">
                            <input type="text" name="ref2" id="ref2">
                            <input type="text" name="ref3" id="ref3">
                            <input type="text" name="ref4" id="ref4">
                            <input type="text" name="ref5" id="ref5">    
                        </td>
                        <td>
                            <input type="text" name="design1" id="design1">
                            <input type="text" name="design2" id="design2">
                            <input type="text" name="design3" id="design3">
                            <input type="text" name="design4" id="design4">
                            <input type="text" name="design5" id="design5">
                        </td>
                    </tr>
                </tbody>
            </table>
             
            <button type="submit" name="button">Valider</button>
        </div>


        </form>
    

 
  </body>
</html>
