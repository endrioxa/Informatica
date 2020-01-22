<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  </head>
  <body style="font-family:Comfortaa">

    <div class="container">
        <div class="row">
          <div class="col">
            <div class="my-3">
              <h1 class="text-center">Informatica 1.0</h1>
              <h6 class="text-center text-muted">Progetto Informatica creato da Endri Hoxha GEN 2020</h6>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <ul class="list-group list-group-horizontal float-right my-2">
              <li class="list-group-item"><a href="?p=visualizza">Tabella</a> </li>
              <li class="list-group-item"><a href="?p=inserisci">Inserisci Alunno</a> </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php require 'src/Main/Main.php'; ?>
          </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
