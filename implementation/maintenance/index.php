<?php

// Start the session
session_start();

require('./Controllers/Frontend/controller.php');

switch ($_GET['action']) {
  case 'client':
    clientIndex();
    break;
  
  default:
    getConnexionPage();
    break;
}
	