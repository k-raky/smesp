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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="/Public/js/scripts.js"></script>

    
  </head>

  <body class="container-fluid">

  <h2 class="card-title mt-5 text-light">Statistiques</h2>
  

    <section class="row">

      <div class="col-12 col-lg-9">
        <div class="row mt-3">  
          <div class="row mt-3">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Activites</h4>
                  <div>
                    <canvas id="chLine"></canvas>
                  </div>
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
            <h4 class="card-title">Meilleurs Techniciens</h4>
          </div>
        </div>
                        
      </div>

      <div class="col-lg-7">
        <div class="row mt-3">  
          <div class="row mt-3">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Activites</h4>
                  <div>
                    <canvas id="chPie"></canvas>
                  </div>
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
