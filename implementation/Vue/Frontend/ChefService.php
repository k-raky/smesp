<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Service de Maintenance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/Public/css/styles.css">

    <link  rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
     
    </style>
  </head>

  <body class="body">
  <?php
    //STOCKER LES VARIABLES EN FONCTIONS DE LA PERSONNE CONNECTÉE
    $titre=$_SESSION['titre'];

    $service=$_SESSION['service'];

    $idUser=$_SESSION['idUser'];  

    $nom=$_SESSION['nom'];

    $contact=$_SESSION['contact'];

    switch ($titre) {

        case "CHEF SUPREME":
        $AllTasks=getAllTasks();
        $AllWaitingTasks=getWaitingTasks();
        $AllTechs=getAllTech();
        break;


        case "CHEF DE POLE":
        $AllTasks=getSpecificTasks($service);
        $AllWaitingTasks=getWaitingSpecificTasks($service);
        $AllTechs=getAllSpecificTech($service);
        break;

        case "AUCUN":
        $AllTasks=getTechTasks($idUser);
        $AllWaitingTasks=getWaitingSpecificTasks($service);
        $AllTechs=getAllSpecificTech($service);
        break;
        
        default:
        break;
    }

  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2 col-md-3 col-xl-2 px-0 px-sm-2 sidebar">

        <div class="pt-4 px-4 d-flex justify-content-center align-items-center">
        
          <img src="/Public/img/avatar.png" alt="IMG" width="100" height="100" class="rounded-circle">
            <div class="m-3"> 
              <strong><?php echo $nom; ?></strong>
              <p><?php echo $idUser."<br/>".$contact; ?></p>
              <a name="logout" href="index.php?action=logout" class="text-info" >Se Deconnecter</a>
            </div>
        </div>
        
        <hr>
          
        <div class="d-flex flex-column my-5 align-items-center align-items-sm-start px-3 pt-5 ml-2 text-white min-vh-100">

          <ul class="nav nav-pills menu flex-column align-items-center align-items-sm-start" id="menu">

          <?php
            if ($titre=="CHEF SUPREME"){
          ?>

            <li class="nav-item p-2">
              <a class="nav-link active align-middle w-100 " data-toggle="pill" href="#home">
              <i class="fas fa-home fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline">Accueil</span>
              </a>
            </li>
          
            
            <li class="nav-item p-2">
              <a class="nav-link w-100 align-middle" data-toggle="pill" href="#tasks">
              <i class="fas fa-tasks fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline ">Taches</span></a>
            </li>

            <li class="nav-item p-2">
              <a class="nav-link w-100 align-middle" data-toggle="pill" href="#techniciens">
              <i class="fas fa-user-md fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline ">Techniciens</span> </a>
            </li>

            <li class="nav-item p-2">
              <a class="nav-link w-100 align-middle" data-toggle="pill" href="#stocks">
              <i class="fas fa-tools fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline ">Stocks</span> </a>
            </li>

            <li class="nav-item p-2">
              <a class="nav-link w-100 align-middle" data-toggle="pill" href="#fiche">
              <i class="far fa-chart-bar" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline ">Statistiques</span></a>
            </li>
            
            <?php
            }
            else if ($titre=="CHEF DE POLE"){
          ?>

            <li class="nav-item p-2">
              <a class="nav-link active align-middle w-100 " data-toggle="pill" href="#home">
              <i class="fas fa-home fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline">Accueil</span>
              </a>
            </li>
          
            
            <li class="nav-item p-2">
              <a class="nav-link w-100 align-middle" data-toggle="pill" href="#tasks">
              <i class="fas fa-tasks fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline ">Taches</span></a>
            </li>

            <li class="nav-item p-2">
              <a class="nav-link w-100 align-middle" data-toggle="pill" href="#techniciens">
              <i class="fas fa-user-md fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline ">Techniciens</span> </a>
            </li>


            <li class="nav-item p-2">
              <a class="nav-link w-100 align-middle" data-toggle="pill" href="#fiche">
              <i class="far fa-chart-bar" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline ">Statistiques</span></a>
            </li>

            <?php
              }
              else{
            ?>

              <li class="nav-item p-2">
                <a class="nav-link active align-middle w-100 " data-toggle="pill" href="#home">
                <i class="fas fa-home fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline">Accueil</span>
                </a>
              </li>
            
              
              <li class="nav-item p-2">
                <a class="nav-link w-100 align-middle" data-toggle="pill" href="#tasks">
                <i class="fas fa-tasks fa-lg" style="color: white;" aria-hidden="true"></i> <span class="ml-3 d-none d-sm-inline">Taches</span></a>
              </li>


            <?php } ?>
            
          </ul>
        </div>
      </div>
      <div class="col-10">
        <!-- Tab panes -->
        <div class="tab-content ml-4">
        
          <div class="tab-pane fade show active" id="home"><?php include_once("Vue/Home.php");?></div>
          <div class="tab-pane fade" id="tasks"><?php include_once("Vue/Orders.php");?></div>
          <div class="tab-pane fade" id="techniciens"><?php include_once("Vue/Techniciens.php");?></div>
          <div class="tab-pane fade" id="stocks"><?php include_once("Vue/Stock.php");?></div>
          <div class="tab-pane fade" id="fiche"><?php include_once("Vue/Statistiques.php");?></div>

        </div>

      </div>

    </div>
  </div>
  
  </body>
</html>