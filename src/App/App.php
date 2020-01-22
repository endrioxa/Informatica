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
    $p = array();
    $p = $this->CalcolaMedia($param);


    $recupera["alunni"][] = $p;
    $data = array('alunni' => $recupera["alunni"] );
    $_SESSION[$nome_sessione] = $data;
  }

  public function CalcolaMedia($param)
  {
    $v1 = $param["votorale"];
    $v2 = $param["votoscritto"];
    $v3 = $param["votopratico"];

    $media = 0;
    $somma = 0;

    $somma = $v1 + $v2 + $v3;
    $media = $somma / 3;
    if ($media < 6) {
        $rsp = "SI";
    }else {
        $rsp = "NO";
    }

    $param["debito"] = $rsp;
    $param["media"] = number_format($media, 1);
    $p =  $this->ReturnClassName($media);
    $param["class"] = $p;

    return $param;
  }

  public function ReturnClassName($voto)
  {
    $class = "";
    if ($voto == 6) {
        $class = "table-warning";
    }else if ($voto > 6) {
        $class = "table-success";

    }else if ($voto < 6) {
        $class = "table-danger";
    }
    return $class;
  }

  public function OrdinaAlunni()
  {
    $nome_sessione = $this->nomesessione;
    $recupera = $_SESSION[$nome_sessione];
    sort($_SESSION[$nome_sessione]["alunni"]);
  }

  public function Data($ordina)
  {
    $data = array();
    $nome_sessione = $this->nomesessione;
    $data = $_SESSION[$nome_sessione];
    switch ($ordina) {
      case 'nome':
          sort($data["alunni"]);
        break;
      case 'debito':
          foreach ($data["alunni"] as $key => $value) {
                    if ($value["debito"] == "NO") {
                        unset($data["alunni"][$key]);
                    }
          }
        break;
      default:
        
        break;
    }
    return $data;
  }

  // Ritorna un array con i indici degli alunni con il debito
  /*
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
*//*
  public function AggiornaMedia()
  {
    $nome_sessione = $this->nomesessione;
    $recupera = array();
    $recupera = $_SESSION[$nome_sessione];

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
  */

}


 ?>
