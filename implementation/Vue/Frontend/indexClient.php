<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Service de Maintenance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="Public/css/styles.css">
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <script src="https://use.fontawesome.com/ddb12bc858.js"></script>


    <style>
        body {
            background-color: #3c95a8;
            background-image: url("Public/img/repair.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: overlay;
            height: 100vh;
        }
        
        .navbar {
            font-size: xx-large;
            color: #3c95a8;
            font-family: 'Belleza';
            margin-left: 10px;
        }

        a.active {
          color: white;
        }

       
    </style>

      

  </head>
  <body>

    
    <nav class="navbar navbar-light bg-light d-flex justify-content-between">
      <a class="navbar-brand" href="#">
        <img
        src="Public/img/logo.png"
        width="150"
        height="150"
        class="d-inline-block align-top"
        />
      </a>
      <div class="col-lg-9 col-sm-9 text-center ml-5">
        <div class="row">
          <div class="col-lg-9">
            <h1>École Supérieure Polytechnique de Dakar</h1>
            <p class="text-muted mb-4">Service de Maintenance</p>
          </div>
          <div class="col-lg-3">
            <a name="logout" href="index.php?action=logout" class="btn btn-default btn-md">
              SE DECONNECTER <i class="fa fa-sign-out fa-2x " aria-hidden="true"></i> 
            </a>
          </div>
          
        </div>
      </div>
      
    </nav>
    
    <div class="container mx-auto bg-light m-5 p-3 ">
     
      <section id="Home" class="section">
          <ul class="nav nav-pills nav-justified mb-5">
              <li class="nav-item">
                  <a class="nav-link text-dark active font-weight-bold" data-toggle="pill" href="#Status" >Status</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-dark font-weight-bold" data-toggle="pill" href="#Formulaire">Formulaire</a>
              </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active container" id="Status">
              <?php
                $idUser=$_SESSION["idUser"];
                $result= getTasks($idUser);
                if (mysqli_num_rows($result) > 0) {
              ?>
              <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Cause</th>
                  <th>Priorite</th>
                  <th>En charge</th>
                  <th>Contact</th>
                  <th>Statut</th>
                  <th>Duree</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  while($row = mysqli_fetch_assoc($result)) {
                  $infotech=getTech($row['idtech']);
              ?>
                
                <tr>
                  <td><?php echo $row["date"] ?></td> 
                  <td><?php echo $row["type"] ?></td> 
                  <td><?php echo $row["cause"] ?></td>
                  <td><?php echo $row["priorite"] ?></td> 
                  <td><?php echo $infotech["prenom"]." ".$infotech['nom'] ?></td>
                  <td><?php echo $infotech["contact"] ?></td> 
                  <td><span class="badge badge-info"><?php echo $row["statut"] ?></span></td> 
                  <td><?php echo $row["delai"]." jours"?></td> 
                </tr>

              <?php } ?>
              </tbody>
            </table>
            <?php }
            else {
              ?>
            <div class="justify-content-center align-item-center">
              <h3 class="text-center">NO REQUESTS</h3>
            </div>
            <?php
            }

            ?>
            </div>
            <div class="tab-pane container fade" id="Formulaire">
              <div>
                
                <div class="my-5 text-center">
                  <h2>Demande D'intervention</h2>
                </div>
                <div class="row mt-5 ">
                 
                  <form class="col-lg-6 col-md-12 m-auto" method="POST">
                  <div class="form-group">
                        <input type="text" name="name" class="form-control" required placeholder="Prenom et Nom"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="contact" class="form-control" required placeholder="Contact"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="fonction" required>
                            <option value="" >---Fonction---</option>
                            <option value="Etudiant">Étudiant</option>
                            <option value="Professeur">Professeur</option>
                            <option value="Technicien">Technicien</option>
                            <option value="Directeur">Directeur</option>
                            <option value="Autre" >Autre</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control" name="type" required>
                            <option value="" >---Type de Défaillance---</option>
                            <option value="Electricite">Électricité</option>
                            <option value="Plomberie">Plomberie</option>
                            <option value="Maconnerie">Maconnerie</option>
                            <option value="Menuiserie">Menuiserie</option>
                            <option value="Climatiseur">Climatiseur</option>
                            <option value="Video Projecteur">Vidéo Projecteur</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="departement" required>
                            <option value="" >---Département---</option>
                            <option value="Genie Informatique">Génie Informatique</option>
                            <option value="Gestion">Gestion</option>
                            <option value="Genie Civil">Génie Civil</option>
                            <option value="Genie Mécanique">Génie Mécanique</option>
                            <option value="Genie Electrique">Génie Electrique</option>
                            <option value="Batiment Direction">Batiment Direction</option>
                            <option value="Batiment ACP">Batiment ACP</option>
                            <option value="Ressources Humaines">Ressources Humaines</option>
                            <option value="Caisse">Caisse</option>
                            <option value="CIFRES">CIFRES</option>
                            <option value="LPAO">LPAO</option>
                            <option value="LERG">LERG</option>
                            <option value="LMAGI">LMAGI</option>
                            <option value="LER">LER</option>
                            <option value="SID">SID</option>
                            <option value="SCOLARITE">SCOLARITÉ</option>
                            <option value="CRENT">CRENT</option>
                            <option value="LAE">LAE</option>
                            <option value="LIMBI">LIMBI</option>
                            <option value="LIRT">LIRT</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="priorite" required>
                            <option value="">---Priorité---</option>
                            <option value="Pas Urgent">Pas Urgent</option>
                            <option value="Peu Urgent">Peu Urgent</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="cause" required>
                            <option value="">---Cause---</option>
                            <option value="Usure Normale">Usure Normale</option>
                            <option value="Defaut Utilisateur">Défaut Utilisateur</option>
                            <option value="Defaut Produit">Défaut Produit</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="message">Type de Defaillance si Autre</label>
                        <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                    </div>
                    <div class="text-center"><input type="submit" class="btn btn-primary" value="Envoyer"/></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </section>
      <footer id="footer" class="h-100 pt-5 mt-5">
        <div class="container">
          <div class="row d-flex ">
            <div class="col-lg-12 text-center">
              <div class="copyright">
                &copy; Copyright <strong>DIABI</strong>. All Rights Reserved
              </div>
                Designed by DIABI
            </div>
          </div>
        </div>
      </footer>
  </div>

  </body>
</html>