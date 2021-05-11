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

    <section>
        <div class="row mt-3">
        <?php $row= getPole(); ?>

          <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3498DB" >
                    <i class="fas fa-eye-slash fa-lg" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted"><?php echo $row[0]["prenom"]." ".$row[0]["nom"]; ?></h6>
                    <h5 class="text-muted">En Attente: <?php echo "Service ".$row[0]["nomPole"]; ?></h5>
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
                    <h5 class="text-muted">Disponible: <?php echo getAllTech(); ?></h5>
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

        

        
      
    </section> 

</body>

</html>
