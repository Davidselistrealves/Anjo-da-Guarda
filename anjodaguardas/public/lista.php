<?php

use Database\Database;

    require_once "../src/model/Database.php";

    $db = new Database();
    $resultDb = $db->select(
        "SELECT * FROM formulario;"
    );
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/assets/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../public/assets/css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../public/assets/img/favicon.ico" type="image/x-icon">
    <title>Lista</title>
</head>
<body>
<nav class="navbar navbar-expand-lg ">
        <div class="container-fluid" >
            <a class="texto navbar-brand" href="#"><img src="../public/assets/img/logotipo.png" alt="logotipo" width="70" heigth="40" ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class= "texto nav-link active" aria-current="page " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class=" texto nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                <a class=" texto nav-link" href="cadastrar.php">Cadastrar</a>

                </li>
                <li class="nav-item">
                <a class="nav-link disabled">
                    
                </a>
                
                </li>        
            </ul>
            </div>
        </div>
    </nav>


<table class="table container mt-4 table-striped">
    <thead class="bg-dark text-white">
        <th>Código</th>
        <th>Supervisor</th>
        <th>Time</th>
        <th>Turno</th>
        <th>Data e Hora</th>
        <th>Irregularidades</th>
        <th></th>
        <th></th>
    </thead>

    <tbody>
        <?php foreach($resultDb as $linha) : ?>
            <tr>
                <td> <?= $linha->idformulario ?></td>
                <td> <?= $linha->supervisor ?></td>
                <td> <?= $linha->timeSetor?></td>
                <td> <?= $linha->turno?></td>
                <td> <?= $linha->dataFormulario ?></td>
                <td> <?= $linha->formulario_epi ?></td>
                </td>

                <td>
                    <a 
                        onclick="confirmaDelete(<?=$linha->idformulario?>);"> 
                            <i 
                                class="bi bi-trash">
                            </i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        
    </tbody>
</table>

<script>
    function confirmaDelete(id){
        if(confirm("Deseja apagar o formulario "+ id + "?") ){
            window.location.href="../public/delete.php?idformulario="+id;
        } else {
            alert("Exclução cancelada!!");
        }
        
    }
</script>
</body>
</html>
