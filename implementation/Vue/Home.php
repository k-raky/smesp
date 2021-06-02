<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Service de Maintenance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/Public/css/styles.css">
    
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f160d06cd2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script src="/Public/js/scripts.js"></script>

    
  </head>

  <body class="container-fluid d-flex justify-content-center">
      
    <section class="row d-flex flex-colum justify-content-between align-self-center">
        
      <h2 class="mb-5">Accueil</h2>
      
       <div class="container-fluid">
     <?php 
  
      //STOCKER LES VARIABLES EN FONCTIONS DE LA PERSONNE CONNECTÉE
      $titre=$_SESSION['titre'];

      $service=$_SESSION['service'];

      switch ($titre) {

        case "CHEF SUPREME":
          $NewTasks=getNewTasks();
          break;


        case "CHEF DE POLE":
          $NewTasks=getNewTaskService($service);
          break;

        case "AUCUN":
          $NewTasks=getNewTaskTech($_SESSION["idUser"]);
          break;

        default:
          break;
      }

    ?> 

      <h4 class="card-title mt-5">Nouvelles Taches</h4>

      <div class="card mt-4">
        <div class="card-body">
          <div class="table-responsive">
          <?php
              if (mysqli_num_rows($NewTasks) > 0) {

            ?>
           <table id="NewTasks" class="row-border hover align-items-center" data-page-length='10' style="width:100%" >
              <thead>
                <tr class="text-info">
                  <th scope="col"></th>
                  <th scope="col">Ref</th>
                  <th scope="col">Date</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Fonction</th>
                  <th scope="col">Type</th>
                  <th scope="col">Cause</th>
                  <th scope="col">Priorite</th>
                </tr>
              </thead>
              <tbody>
              <?php
                while($row = mysqli_fetch_assoc($NewTasks)){
                  $ref=$row['ref'];
                  $date=$row['date'];
                  $nom=$row['nom'];
                  $contact=$row['contact'];
                  $fonction=$row['fonction'];
                  $type=$row['type'];
                  $cause=$row['cause'];
                  $priorite=$row['priorite'];

                  echo "<tr><td><i class='fas fa-exclamation-triangle animate__animated animate__flash animate__infinite	animate__slower' style='color : orange;'></i></td>";
                  echo "<td>$ref</td>";
                  echo "<td>$date</td>";
                  echo "<td>$nom</td>";
                  echo "<td>$contact</td>";
                  echo "<td>$fonction</td>";
                  echo "<td>$type</td>";
                  echo "<td>$cause</td>";
                  echo "<td>$priorite</td></tr>";
                 
                  }
                ?>
                </tbody>
              </table>
              
              <?php } else echo "<script>alert('Pas de nouvelles taches aujourd'hui ! ')</script>"; ?>
          </div>
          </div>
        </div>
      </div>


<?php
        
        
            while($row3 = mysqli_fetch_assoc($AllWaitingTasks)){
                  for ($i=0; $i <4 ; $i++) { 
                    $row2[$i]=$row3['nombreTaches'];
                  }
    }
        
        ?>

    <h4 class="card-title mt-5">En chiffres</h4>
      <div class="col-12 mt-2">
        <div class="row mt-3 m-auto">

          <div class="col-lg-4 col-md-4 mb-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3c95a8" >
                    <i class="fas fa-spinner fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">En Cours : <?php echo $row2[0] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 mb-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3c95a8" >
                    <i class="fas fa-exclamation fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">En Attente : <?php echo $row2[1] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 mb-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3c95a8" >
                  <i class="far fa-pause-circle fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">Suspendues : <?php echo $row2[2] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 mb-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3c95a8" >
                    <i class="fa fa-check fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">Terminees : <?php echo $row2[3] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-4 mb-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#DAF7A6 ">
                    <i class="fas fa-user-md fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Techniciens</h6>
                    <h5 class="text-muted">Disponibles : <?php echo $AllTechs; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 mb-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#FFC300 ">
                    <i class="fas fa-tools fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Matériels</h6>
                    <h5 class="text-muted">Indisponibles : 0</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12 col-md-4 mb-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#F1948A ">
                    <i class="fas fa-tools fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Matériels</h6>
                    <h5 class="text-muted">Disponibles : 0</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
  
      </div>
      
      

      
    </section>
        

</body>

</html>
