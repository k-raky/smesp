
<?php
  require("maint.php");
  ?>

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
    
    <script type="text/javascript" src="maint.js">
       
    </script>

    
      <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: white;">
        <i class="fas fa-tools fa-2x x-5" style="color: #f4900c;"></i>
           <a class="navbar-brand" href="#accueil.html">SMESP</a>
       </nav>
   
          <div class="container-fluid bg-light">
          <input type="search" name="search" id="search" placeholder="rechercher" class="d-flex align-self-end border-info m-3">
            <h1 class="titre m-5">LES TACHES</h1>

              <div class="nav nav-tabs nav-justified" id="nav-tab">
                <a class="nav-item nav-link active" id="encours" data-toggle="tab" href="#nav-encours" >EN COURS</a>
                <a class="nav-item nav-link" id="suspendue" data-toggle="tab" href="#nav-suspendue" >SUSPENDUES</a>
                <a class="nav-item nav-link" id="terminee" data-toggle="tab" href="#nav-terminee" >TERMINEE</a>
                <a class="nav-item nav-link" id="attente" data-toggle="tab" href="#nav-attente" >EN ATTENTE</a>
              </div>
          
            
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-encours" ><?php include_once("encours.php"); ?></div>
              <div class="tab-pane fade" id="nav-suspendue"><?php include_once("suspendue.php"); ?></div>
              <div class="tab-pane fade" id="nav-terminee"><?php include_once("termine.php");?></div>
              <div class="tab-pane fade" id="nav-attente"><?php include_once("attente.php"); ?></div>
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
              <button class="btn btn-sm" type="submit" name="attribuerService" style="background-color: #f4900c;color:white;width:30%; margin-top : 10px;" >Valider</button>
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