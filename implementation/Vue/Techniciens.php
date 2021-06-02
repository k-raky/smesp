<!doctype html>
<html lang="en">
  <head>
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
    
   
  </head>
 
  <body>       
    <div class="container-fluid">
     <?php 
  
      //STOCKER LES VARIABLES EN FONCTIONS DE LA PERSONNE CONNECTÉE
      $titre=$_SESSION['titre'];

      $service=$_SESSION['service'];

      switch ($titre) {

        case "CHEF SUPREME":
          $AllTechs=getAllTechnicien();
          break;


        case "CHEF DE POLE":
          $AllTechs=getInfoTech($service);
          break;

        default:
          break;
      }

    ?> 

      <h2 class="card-title mt-5">Techniciens</h2>

      <div class="card mt-4">
        <div class="card-body">
          <div class="table-responsive">
            <?php
              if (mysqli_num_rows($AllTasks) > 0) {

            ?>
           <table id="techTable" class="table table-bordered hover align-items-center text-center" data-page-length='10' style="width:100%" >
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
              <?php
                while($row = mysqli_fetch_assoc($AllTechs)){
                        $id=$row['idTechnicien'];
                        $nomtech=$row['prenom']." ".$row['nom'];
                        $contacttech=$row['contact'];
                        $servicetech=$row['service'];
                        $statuttech=$row['statut'];

                        echo "<tr><td scope='row'>$id</td>";
                        echo "<td>$nomtech</td>";
                        echo "<td>$contacttech</td>";
                        echo "<td>$servicetech</td>";
                        echo "<td class='text-warning'>$statuttech</td></tr>";
                  }
                ?>
                </tbody>
              </table>
              
              <?php } else echo "<script>alert('nothing');</script>"; ?>
          </div>
          </div>
        </div>
      </div>
    

  </body>
</html>

