
<?php 
use Database\Database;
require_once "../src/model/Database.php";


if( isset($_POST['usuario']) 
&& isset($_POST['pass'])
&& isset($_POST['cargo'])
&& isset($_POST['nome'])
){
$db= new Database();
$nome = $_POST['nome'];
$idusuario = $_POST['usuario'];
$cargo = $_POST['cargo'];
$senha = $_POST ['pass'];

$resultDb = $db ->insert(
    "INSERT INTO cadastro(nome, cargo, senha,idusuario)
    VALUES ('$nome', '$cargo','$senha','$idusuario');"
);

if($resultDb) : ?>
    <script>
        alert("Cadastro efetuado com sucesso!");
        window.location.replace('login.php');
    </script>
<?php endif;

};


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
        <a class="texto navbar-brand" href="#"><img src="../public/assets/img/logotipo.png" alt="logotipo" width="100" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
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

    <main>
        <div class = "divCadastro">
            <form method="POST" action="cadastrar.php">
                    <div class="form-group">
                        <div class="row">
                            <h2 class = "tituloCadastro">Cadastre-se</h2>
                            <br><br>
                            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">
                                <p>Informe seu nome completo</p>
                                <input class="form-control"type="text" name="nome" placeholder="EX.: Jão da Silva" required/>  
                                <br><br>
                                <p>Informe um id usuário</p>
                                <input class="form-control"type="text" name="usuario" placeholder="EX.: Jão123" required/>  
                                <br><br>
                                <p>Informe cargo</p>
                                <input class="form-control"type="text" name="cargo" placeholder="EX.: montador" required/>  
                                <br><br>
                                <p>Informe sua senha</p>
                                <input class="form-control" type="password" name="pass" placeholder="EX.: 1234" required/>   
                                <br><br>
                            </div>
                        </div>
                            <div class="row">    
                                <input  class="btn btn-primary col-sm-12 col-md-4   col-lg-4 offset-md-4 offset-lg-4"  type="submit"  value="Salvar"/>
                               
                                
                            </div>
                    </div>
            </form>

        </div>
    </main>



    <footer class="texto">
        <p class="pFooter">  Para melhorar a área de trabalho das empresas, desenvolvemos um projeto web com intuito de armazenar  informações sobre uso indevido de EPIS e postura indevida  do       funcionário em serviço naquele setor e se o próprio possui irregularidades , visando a otimização no armazenamento dos dados de funcionários e setores de empresas que tenham interesse na utilização da aplicação.
        </p>
    </footer>
</body>



</html>