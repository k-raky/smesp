<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Service de Maintenance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="Public/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <style>
     body {
            background-color: rgba(255, 255, 255, 0.733);
            background-image: url("Public/img/repair.jpg");
            background-repeat: no-repeat;
            background-size:contain;
            background-position: right;
            background-blend-mode:overlay;
            height: 100vh;
            width: 100%;
        }
      .rond{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 5%;
            box-shadow: 0 1px 0 0 #3c95a8;
           margin-right: 15%;
           background-color: rgba(255, 255, 255, 0.733);
           
      }
      
    </style>
  
  </head>

  <body class="container-fluid ">
  
  <nav class="navbar navbar-expand-md d-flex align-items-start" style="padding-left : 10%;">
  <a class="navbar-brand" href="#">
        <img
        src="Public/img/logo.png"
        width="150"
        height="150"
        class="d-inline-block align-top"
        />
      </a>
    <div class="text-center my-auto">
         <h1>École Supérieure Polytechnique de Dakar</h1>
            <p class="text-muted">Service de Maintenance</p>
    </div>
       </nav>
  
</div>
   <div class="container-fluid d-flex justify-content-between"> 

          <div class="col-lg-3 indexImg mt-5">
          <img src="Public/img/techniciens.jpg" class="img-fluid" alt="something"/>
        </div>

        <div class="rond col-lg-4 rounded-circle mt-0">
          <i class="fa fa-user-circle fa-5x mb-3" style="color: #3c95ae;"></i>
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
              <button type="submit" class="btn btn-info btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
          </form>
          </div>
   </div>
      

  <footer id="footer" class="fixed-bottom p-3">
    <div class="container-fluid d-flex justify-content-between">
          <p>&copy; Copyright <strong>DIABI</strong>. All Rights Reserved</p>
          <p>Designed by DIABI</p>
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