<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Service de Maintenace</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="Public/css/styles.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container m-auto">
      <header id="home" class="mt-4 mb-5">
        <div class="row justify-content-center">
          <a href="#" class="col-lg-2 col-sm-2">
            <img
              src="Public/img/logo.png"
              width="150"
              height="150"
              class="d-inline-block align-top"
            />
          </a>
          <div class="col-lg-9 col-sm-9 text-center ml-5">
              <h1>École Supérieure Polytechnique de Dakar</h1>
              <p class="text-muted mb-4">Service de Maintenace</p>
            </div>
        </div>
      </header>
      <section id="Home">
          <ul class="nav nav-pills nav-justified mb-5">
              <li class="nav-item">
                  <a class="nav-link text-dark active" data-toggle="pill" href="#Status" >Status</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-dark" data-toggle="pill" href="#Formulaire">Formulaire</a>
              </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane container" id="Status">
              <?php
                $result=$_SESSION["getTasks"];
                if (mysqli_num_rows($result) > 0) {
              ?>
              <table class="table table-hover">
              <thead>
                <tr>
                  <th>Cause</th>
                  <th>Date de Demande</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  while($row = mysqli_fetch_assoc($result)) {
                    $cause="";
                    switch ($row["cause"]) {
                      case 'usureNormale':
                        $cause="Usure Normale";
                        break;
                      case 'defautUtilisateur':
                        $cause="Défaut Utilisateur";
                        break;
                      case 'defautProduit':
                        $cause="Défaut Produit";
                        break;
                      default:
                        $cause="Autre";
                        break;
                    }
              ?>
                
                <tr>
                  <td><?php echo $cause ?></td>
                  <td><?php echo $row["dateDebut"] ?></td> 
                  <td><span class="badge badge-primary"><?php echo $row["etat"] ?></span></td> 
                </tr>

              <?php } ?>
              </tbody>
            </table>
            <?php } ?>
            </div>
            <div class="tab-pane container fade active" id="Formulaire">
              <div>
                
                <div class="my-5 text-center">
                  <h2>Demande D'intervention</h2>
                </div>
                <div class="row mt-5">
                  <div class="col-lg-6">
                      <div >
                          <h3>Service de Maintenance</h3>
                          <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                      </div>
                  </div>

                  <form class="col-lg-6 col-md-12" method="POST">
                    <div class="form-group">
                        <input type="text" name="contact" class="form-control" required placeholder="Contact"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="type" required>
                            <option value="" >---Type de Défaillance---</option>
                            <option value="electricite">Électricité</option>
                            <option value="plomberie">Plomberie</option>
                            <option value="maconnerie">Maconnerie</option>
                            <option value="menuiserie">Menuiserie</option>
                            <option value="climatiseur">Climatiseur</option>
                            <option value="videoprojec">Vidéo Projecteur</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="priorite" required>
                            <option value="">---Priorité---</option>
                            <option value="pasUrgent">Pas Urgent</option>
                            <option value="peuUrgent">Peu Urgent</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="cause" required>
                            <option value="">---Cause---</option>
                            <option value="usureNormale">Usure Normale</option>
                            <option value="defautUtilisateur">Défaut Utilisateur</option>
                            <option value="defautProduit">Défaut Produit</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
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