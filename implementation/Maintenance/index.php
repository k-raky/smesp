<?php

// Start the session
session_start();

require('./Controllers/controller.php');

if(!$_GET["action"])
  getConnexionPage();

switch ($_GET['action']) {
  case 'client':
    clientIndex();
    break;
  case 'chefService':
    getChefServicePage();
    break;
  default:
    getConnexionPage();
    break;
}

	