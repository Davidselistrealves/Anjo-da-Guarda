<?php

use Database\Database;

if(isset($_GET['idformulario'])){
    $idformulario = $_GET['idformulario'];
}else{
header('location: ../public/lista.php');
}

require_once "../src/model/Database.php";
$db = new Database();

$resultDb = $db->delete(
    "DELETE FROM formulario WHERE idformulario = $idformulario; "
);

var_dump($resultDb);

if($resultDb) : ?>
    <script>
        alert("Formulario excluido com sucesso!!!");
        window.location.replace("../public/lista.php");
    </script>
<?php else :
    echo"Erro durante a exclusão ";
endif;



?>