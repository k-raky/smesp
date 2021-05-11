<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Service de Maintenace</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/Public/css/styles.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f160d06cd2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="/Public/js/scripts.js"></script>

    
  </head>

  <body class="container-fluid">

  <h2 class="card-title mt-5">Home</h2>
  

    <section class="row">
      <div class="col-12 col-lg-9">
        <div class="row mt-3">

          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3498DB" >
                    <i class="fas fa-eye-slash fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">En Attente: <?php echo $AllWaitingTasks ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#DAF7A6 ">
                    <i class="fas fa-user-md fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Techniciens</h6>
                    <h5 class="text-muted">Disponible: <?php echo $AllTechs; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#FFC300 ">
                    <i class="fas fa-tools fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Matériels</h6>
                    <h5 class="text-muted">Indisponible: 0</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#F1948A ">
                    <i class="fas fa-tools fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Matériels</h6>
                    <h5 class="text-muted">0</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Activities</h4>
                <div>
                  <canvas id="chLine"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <h4 class="card-title pb-5">Demandes D'Intervention</h4>
                  <?php
                    if (mysqli_num_rows($AllTasks) > 0) {

                  ?>
                  <table id="example" class="row-border hover order-column" data-page-length='10' style="width:100%">
                    <thead>
                      <tr>
                        <th>Contact</th>
                        <th>Type</th>
                        <th>Priorite</th>
                        <th>Date de Demande</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      while($row = mysqli_fetch_assoc($AllTasks)) {
                    ?>
                      <tr>
                        <td><?php echo $row["contact"] ?></td>
                        <td><?php echo $row["type"] ?></td>
                        <td><?php echo $row["priorite"] ?></td>
                        <td><?php echo $row["date"] ?></td>
                        <td>
                          <span class="badge bg-primary"><?php echo $row["statut"] ?></span>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </div>

      <div class="col-12 col-lg-3">

        <div class="card mt-3">
          <div class="card-body px-3 py-4-5">
            <div class="row">
              <div class="col-3 align-items-center justify-content-center align-content-center">
                <img src="/Public/img/avatar.png" height="100%" width="100%"/>
              </div>
              <div class="col-9">
                <h6 class="text-muted">Technicien de l'Année</h6>
                <h5 class="text-muted">20 Interventions</h5>
              </div>
            </div>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <h4 class="card-title">Meillleurs Techniciens</h4>
          </div>
        </div>
                        
      </div>
    </section>
        

      <script type="text/javascript">
      $('#example').DataTable( {
          paging: true,
          scrollY: false
      } );
    </script>

</body>

</html>
