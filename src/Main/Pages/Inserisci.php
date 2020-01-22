<?php

  require_once 'src/App/App.php';
  $obj = new App("registro");


  function InserisciScreen () {
        GLOBAL $obj;
        $data = array();

        if (isset($_POST["button"])) {

          if (isset($_POST["nome"])) $data["nome"] = $_POST["nome"];
          if (isset($_POST["votorale"])) $data["votorale"] = $_POST["votorale"];
          if (isset($_POST["votoscritto"])) $data["votoscritto"] = $_POST["votoscritto"];
          if (isset($_POST["votopratico"])) $data["votopratico"] = $_POST["votopratico"];

          $obj->InserisciAlunno($data);
          VisualizzaForm(true);
        }else {
            VisualizzaForm(false);
        }


  }

  function VisualizzaForm($msg)
  {
    echo '<div class="col">
        <form  action="?p=inserisci" method="post">
          <label class="text-muted">Nome e Cognome</label>
          <input type="text" name="nome" class="form-control">
          <label class="text-muted">Voto Orale</label>
          <input type="text" name="votoscritto" class="form-control">
          <label class="text-muted">Voto Scritto</label>
          <input type="text" name="votorale" class="form-control">
          <label class="text-muted">Voto Pratico</label>
          <input type="text" name="votopratico" class="form-control">
          <div class="my-2">
            <button type="submit" class="btn btn-success" name="button" value="invia">Invia</button>
            <button type="reset" class="btn btn-danger" >Cancella</button>
          </div>
        </form>
    ';
    if (isset($_POST["nome"])) {
        $nome = $_POST["nome"];
    }
    if ($msg == true) {
      echo '<div class="alert alert-success" role="alert">
              Alunno <b>'.$nome.'</b> e stato registrato con successo
            </div></div>';
    }
  }



 ?>
