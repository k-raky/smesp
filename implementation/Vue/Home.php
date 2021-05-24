<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Service de Maintenance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/Public/css/styles.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f160d06cd2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script src="/Public/js/scripts.js"></script>

    
  </head>

  <body class="container-fluid d-flex justify-content-center">

  <h2 class="card-title mt-5">Accueil</h2>
  

    <section class="row d-flex align-items-center justify-content-center align-self-center">
      <div class="col-12 col-lg-9">
        <div class="row mt-3 m-auto">

          <div class="col-6 col-lg-3 col-md-6 m-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3498DB" >
                    <i class="fas fa-spinner fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">En Cours : <?php echo $AllWaitingTasks[0] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-3 col-md-6 m-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3498DB" >
                    <i class="fas fa-exclamation fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">En Attente : <?php echo $AllWaitingTasks[1] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-3 col-md-6 m-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3498DB" >
                  <i class="far fa-pause-circle fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">Suspendues : <?php echo $AllWaitingTasks[3] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-3 col-md-6 m-3">
            <div class="card">
              <div class="card-body px-3 py-4-5">
                <div class="row pl-3">
                  <div class="col-3 rounded d-flex align-items-center justify-content-center" style="background-color:#3498DB" >
                    <i class="fa fa-check fa-2x" style="color:white"></i>
                  </div>
                  <div class="col-9">
                    <h6 class="text-muted">Taches</h6>
                    <h5 class="text-muted">Terminees : <?php echo $AllWaitingTasks[2] ; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-6 col-lg-3 col-md-6 m-3">
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

          <div class="col-6 col-lg-3 col-md-6 m-3">
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
          
          <div class="col-6 col-lg-3 col-md-6 m-3">
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
