<?php
  require_once 'src/App/App.php';
   $obj = new App("registro");
  require_once 'src/Main/Pages/Visualizza.php';
  require_once 'src/Main/Pages/Inserisci.php';

  $action = NULL;
  if (isset($_GET['p'])) $action = $_GET['p'];

  switch ($action) {
    case 'visualizza':
        VisualizzaScreen();
      break;
    case 'inserisci':
        InserisciScreen();
      break;
    default:
        VisualizzaScreen();
      break;
  }


 ?>
