
<?php 
use Database\Database;
require_once "../src/model/Database.php";

$db= new Database();

/*$db ->insert(
    "INSERT INTO cadastro(nome, cargo, senha)
    VALUES ('David', 'Montador','1234');
    "
);*/

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
    <title>Inicio</title>
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

    <!-- come??a a main -->
    <main>
    
        <img src="../public/assets/img/foto1.jpg" alt="trabalhadores" width="100%" heigth="30%">


   
    </main>
    <footer class="texto">
        <p class="pFooter">  Para melhorar a ??rea de trabalho das empresas, desenvolvemos um projeto web com intuito de armazenar  informa????es sobre uso indevido de EPIS e postura indevida  do       funcion??rio em servi??o naquele setor e se o pr??prio possui irregularidades , visando a otimiza????o no armazenamento dos dados de funcion??rios e setores de empresas que tenham interesse na utiliza????o da aplica????o.
        </p>
    </footer>

</body>
</html>