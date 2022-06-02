<?php
namespace model;

class formulario
{
    public $dataHora;


private function gerarData()
{
    date_default_timezone_set("America/Sao_Paulo");
    $this->dataHora = date('Y-m-d H:i:s');
    echo "<br>Data e hora do pedido:<br>";
    echo date("d/m/Y H:i:s");
}

}