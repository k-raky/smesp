
<!doctype html>
<html lang="en">
  <head>
    <title>Demande Technicien</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
    
        .piece{
            font-weight: bold;
        }
        #thead{
            color: #3c95a8;
            background-color: #dcdcdc;
        }
        label{
            font-weight: bold;
            color: #3c95a8;
        }
        input ,textarea, td{
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
 
   
 
    <!-- Modal -->
    <div class="modal fade" id="modalvalider">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" >
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title m-5">Fiche d'Intervention</h3>       
                        <p class="font-weight-bold font-size-large"><?php echo date("d/m/Y"); ?></p>
                </div>
                <div class="modal-body">
                   
            
                <form action="#" method="post">
                    <div class="form-group text-center">
                        <table class="table table-bordered ">
                            <thead id="thead">
                                <tr>
                                    <th>Reference</th>
                                    <th>Demandeur</th>
                                    <th>Contact</th>
                                    <th>Fonction</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="reftache" id="reftache"></td>
                                    <td id="demandeur"></td>
                                    <td id="contactfiche"></td>
                                    <td id="fonctionfiche"></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead id="thead">
                                <tr>
                                    <th>Type de maintenance</th>
                                    <th>Type de defaillance</th>
                                    <th>Priorite</th>
                                    <th>Cause de la defaillance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 
                                            <input type="radio" name="typemaint" value="corrective" >
                                            <label for="corr">Corrective</label>
                                            <div></div>
                                            <input type="radio" name="typemaint" value="preventive" >
                                            <label for="prev">Preventive</label>  
                                    </td>
                                    <td id="typefiche"></td>
                                    <td id="prioritefiche"></td>
                                    <td id="causefiche"></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead id="thead">
                                <tr>
                                    <th>Intervenants</th>
                                    <th>Visa Demandeur</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="d-flex flex-column">
                                        <input type="text" name="interv1" id="interv1">
                                        <input type="text" name="interv2" id="interv2">
                                        <input type="text" name="interv3" id="interv3">
                                        <input type="text" name="interv4" id="interv4">
                                        <input type="text" name="interv5" id="interv5">
                                    </td>

                                    <td><textarea class="form-control" name="visa" id="visa" rows="3"></textarea></td>

                                    <td class="d-flex justify-content-center align-items-center" >
                                    <div class="d-flex flex-column align-items-end justify-content-evenly">
                                    <label for="date">Date de l'Intervention</label>
                                    <label for="lieu">Lieu de l'Intervention </label>
                                    <label for="duree">Duree de l'Intervention </label>
                                    </div>
                                    <div class="d-flex flex-column align-items-start justify-content-evenly">
                                    <input type="date" name="datetache" id="datetache">
                                        <input type="text" name="lieu" id="lieu">
                                        <input readonly type="text" name="dureetache" id="dureetache">
                                    </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div>
                            <p class="piece">PIECES DE RECHANGES ET CONSOMMABLES</p>
                        </div>


                        <table class="table table-bordered">
                            <thead id="thead">
                                <tr>
                                    <th>Quantite</th>
                                    <th>Marque/Reference</th>
                                    <th>Designation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="quant1" id="quant1">
                                        <input type="text" name="quant2" id="quant2">
                                        <input type="text" name="quant3" id="quant3">
                                        <input type="text" name="quant4" id="quant4">
                                        <input type="text" name="quant5" id="quant5">
                                    </td>
                                    <td>
                                        <input type="text" name="marque1" id="marque1">
                                        <input type="text" name="marque2" id="marque2">
                                        <input type="text" name="marque3" id="marque3">
                                        <input type="text" name="marque4" id="marque4">
                                        <input type="text" name="marque5" id="marque5">    
                                    </td>
                                    <td>
                                        <input type="text" name="design1" id="design1">
                                        <input type="text" name="design2" id="design2">
                                        <input type="text" name="design3" id="design3">
                                        <input type="text" name="design4" id="design4">
                                        <input type="text" name="design5" id="design5">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <button class="btn-info" type="submit" name="SubmitFiche">Valider</button>
                    </div>
                    </form>
    
        </div>
            
            </div>
        </div>
    </div>
 
  </body>
</html>