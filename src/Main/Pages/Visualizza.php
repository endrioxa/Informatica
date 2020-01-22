
<?php

  function VisualizzaScreen () {
    StampaTabella();
  }

  function StampaTabella()
  {
    echo '<div class="card mb-5">
      <div class="card-header text-center">Tabella Dati</div>
      <div class="card-body">
      <div class="dropdown">
        <button class="btn btn-warning dropdown-toggle mb-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ordina Per
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="?p=visualizza&ordina=nome">Nome</a>
          <a class="dropdown-item" href="?p=visualizza&ordina=debito">Debito</a>
          <a class="dropdown-item" href="?p=visualizza">Reset</a>
        </div>
      </div>
      <h6 class="text-muted" style="font-size:15px;font-family:Arial;">Scegli in che ordine devono essere vuisualizati i dati</h6>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">N.</th>
              <th scope="col">Nome</th>
              <th scope="col">Scritto</th>
              <th scope="col">Orale</th>
              <th scope="col">Pratico</th>
              <th scope="col">Media</th>
              <th scope="col">Debito</th>
            </tr>
          </thead>
          <tbody>
    ';
    global $obj;
    $d = $obj->Data($_GET["ordina"]);

      foreach ($d["alunni"] as $key => $value) {
        echo '
        <tr class="'.$value["class"].'">
              <th scope="row">'.$key.'</th>
              <td>'.$value["nome"].'</td>
              <td>'.$value["votoscritto"].'</td>
              <td>'.$value["votorale"].'</td>
              <td>'.$value["votopratico"].'</td>
              <td>'.$value["media"].'</td>
              <td>'.$value["debito"].'</td>
        </tr>';
      }

  echo '
          </tbody>
        </table>
      </div>
      <h6 class="text-center text-muted">Questa tabella e stata generata automaticamente dal sistema</h6>
    </div>';


  }




 ?>
