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
  <body class="container m-auto">
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

    <section class="overflow-hidden d-flex mt-1 m-auto">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h3 class="display-4">Demande D'intervention!</h3>
          <p class="text-muted mb-4">Connectez-vous avec votre mail esp.sn</p>
          <form method="post" action="">
              <div class="form-group" class="mb-3">
                  <input type="email" 
                          name="email" 
                          placeholder="Email address" 
                          required="isRequired" 
                          autofocus="" 
                          class="form-control rounded-pill border-0 shadow-sm px-4"
                  />
              </div>
              <div class="form-group" class="mb-3">
                  <input name="password" 
                          type="password" 
                          placeholder="Password" 
                          required="isRequired" 
                          class="form-control rounded-pill border-0 shadow-sm px-4 text-primary"
                  />
              </div>
              <div class="custom-control custom-checkbox mb-3">
                  <input id="customCheck1" type="checkbox" checked class="custom-control-input"/>
              </div>
              <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
          </form>
          </div>
          <div class="col-lg-6 indexImg pr-0">
          <img src="Public/img/techniciens.jpg" class="img-fluid" alt="something"/>
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



  <?php
    // define variables and set to empty values
    $email = $password = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = test_input($_POST["email"]);
      $password = test_input($_POST["website"]);
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>
  </body>
</html>