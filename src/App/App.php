<?php

/**
 * App
 */
class App
{

  function __construct($nome_sessione)
  {
    session_start();
    if (!isset($_SESSION[$nome_sessione])) {
      $_SESSION[$nome_sessione] = array();
    }
    $this->nomesessione = $nome_sessione;
  }

  public function InserisciAlunno($param)
  {
    $nome_sessione = $this->nomesessione;
    $recupera = array();
    $recupera = $_SESSION[$nome_sessione];
    $recupera["alunni"][] = $param;
    $data = array('alunni' => $recupera["alunni"] );
    $_SESSION[$nome_sessione] = $data;
  }

  public function OrdinaAlunni()
  {
    $nome_sessione = $this->nomesessione;
    $recupera = $_SESSION[$nome_sessione];
    sort($_SESSION[$nome_sessione]["alunni"]);
  }

  public function AlunniDebito()
  {
    $nome_sessione = $this->nomesessione;
    $recupera = array();
    $recupera = $_SESSION[$nome_sessione];
    $debito = array();

    foreach ($recupera["alunni"] as $key => $val) {
            if ($val["debito"] == "si") {
                $debito[] = $key;
            }
    }
    return $debito;
  }

  public function AggiornaMedia()
  {
    $nome_sessione = $this->nomesessione;
    $recupera = array();
    $recupera = $_SESSION[$nome_sessione];
    $debito = array();

    $somma = 0;
    $media = 0;

    foreach ($recupera["alunni"] as $key => $val) {
      $votoorale = $val["votorale"];
      $votoscritto = $val["votoscritto"];
      $votopratico = $val["votopratico"];
      $somma = $votoorale + $votoscritto + $votopratico;
      $media = $somma / 3;
      $_SESSION[$nome_sessione]["alunni"][$key]["media"] = $media;
      if ($media < 6) {
        $_SESSION[$nome_sessione]["alunni"][$key]["debito"] = "si";
      }else {
          $_SESSION[$nome_sessione]["alunni"][$key]["debito"] = "no";
      }
      $somma = 0;
      $media = 0;

    }
  }

}

 ?>
