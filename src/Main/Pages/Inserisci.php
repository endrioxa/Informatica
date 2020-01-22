<?php

  function InserisciScreen () {
        GLOBAL $obj;
        $data = array();

        if (isset($_POST["button"])) {

          if (isset($_POST["nome"])) $data["nome"] = $_POST["nome"];
          if (isset($_POST["votorale"])) $data["votorale"] = $_POST["votorale"];
          if (isset($_POST["votoscritto"])) $data["votoscritto"] = $_POST["votoscritto"];
          if (isset($_POST["votopratico"])) $data["votopratico"] = $_POST["votopratico"];
          $data["media"] = 0;
          $data["debito"] = "";
          $data["class"] = "";

          $obj->InserisciAlunno($data);
          VisualizzaForm(true);
        }else {
          VisualizzaForm(false);
        }

  }

  function VisualizzaForm ($msg)
  {
    if (isset($_POST["nome"])) {
        $nome = $_POST["nome"];
    }
    if ($msg == true) {
        echo '
              <div class="alert alert-success my-2 alert-dismissible fade show" role="alert">
                Alunno <b>'.$nome.'</b> e stato registrato con successo
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              ';
    }
    echo ' <div class="card">
              <div class="card-header text-center">Inserisci Alunno</div>
                  <div class="card-body">
                      <form  action="?p=inserisci" method="post">
                        <label class="text-muted">Nome e Cognome</label>
                        <input type="text" name="nome" class="form-control" required>
                        <label class="text-muted">Voto Orale</label>
                        <input type="number" name="votoscritto" class="form-control" required>
                        <label class="text-muted">Voto Scritto</label>
                        <input type="number" name="votorale" class="form-control" required>
                        <label class="text-muted">Voto Pratico</label>
                        <input type="number" name="votopratico" class="form-control" required>
                        <div class="my-2">
                          <button type="submit" class="btn btn-success" name="button" value="invia">Invia</button>
                          <button type="reset" class="btn btn-danger" >Cancella</button>
                        </div>
                      </form>
                  </div>
            </div>
    ';
  }



 ?>
