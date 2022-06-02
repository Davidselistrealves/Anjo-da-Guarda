<?php 

use Database\Database;
require_once "../src/model/Database.php";
$descaracterizacao ="descaracterização";

if( isset($_POST['idusuario']) ){
    $idusuario = $_POST['idusuario'];
}else{
    $idusuario = null;
}
if( isset($_POST['pass']) ){
    $pass = $_POST['pass'];
}else{
    $pass = null;
}
if(isset($_POST['supervisor'])){
    $supervisor = $_POST['supervisor'];
}else{
    $supervisor = null;
}

if(isset($_POST['timeSetor'])){
   $timeSetor = $_POST['timeSetor']; 
}else{
    $timeSetor = null;
}

if(isset($_POST['turno'])){
    $turno = $_POST['turno'];
}else{
    $turno = null;
}
if(isset($_POST['formulario-epi'])){
    $formularioEpi = $_POST['formulario-epi'];
}else{
    $formularioEpi = null;
}

//if(isset($_POST['dataFormulario'])){
  //  $dataFormulario = $_POST['dataFormulario '];
//}else{
  //  $dataFormulario = null;
//}





//var_dump($idusuario);
//var_dump($pass);

$db= new Database();

$resultDb = $db ->select(
    "SELECT * FROM cadastro WHERE idusuario = '$idusuario';"
);

//var_dump($resultDb);

if(isset($resultDb[0]) ) {
    $idusuarioDb = $resultDb[0]->idusuario;
    $senhaDb = $resultDb[0]->senha;
} else{
    $idusuarioDb = null;
    $senhaDb = null;
}


if($idusuario != null && $pass != null) {
    if($idusuario == $idusuarioDb &&  $pass == $senhaDb) :
        session_start();

        $_SESSION['user'] = $resultDb[0];

        //var_dump($_SESSION['user']);

        $msg = 'Bem vindo '. $_SESSION['user']->nome . '!'; 
    else : ?>
        <script>
            alert("Usuário ou senha inválido!");
            window.location.replace("login.php");
        </script>   
    <?php endif;
}




//var_dump($supervisor);
//var_dump($timeSetor);
//var_dump($turno);
//var_dump($dataFormulario);
//var_dump($formularioEpi);
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


    <title>Formulário</title>
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

    <div class="text-center text-purple">
        <h1><?php echo isset($msg)? $msg :"" ?></h1>        
    </div>

    <main>
<?php
$listaEpi = null;

if( isset($formularioEpi)) {
    foreach($formularioEpi as $epi) {
        $listaEpi .= $epi . ", ";
    }
}

 $db= new Database();
  $resultDb = $db ->insert(
    "INSERT INTO formulario (Supervisor, TimeSetor, turno, formulario_epi)
    VALUES('$supervisor', '$timeSetor','$turno','$listaEpi');"
);
?>
        <div class = "divFormulario">
            <form method="POST" action="formulario.php">
                 <div class = "form-group">
                     <div class="row">   
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">
                                        <p>Supervisor</p>
                                            <input class="inputcima" type="text" name="supervisor" />
                                            <br>

                                            <p>Time</p>
                                                <input class="inputcima" type="number" name="timeSetor" min="0"/>  
                                           <br>

                                           <p class="paragrafo col-lg-6 col-md-8 col-sm-8">Turno
                                           
                                           <select class="form-select" name="turno" required>
                                                <option value="">Selecione...</option>
                                                <option value="Manhã">Manhã</option>
                                                <option value="Tarde">Tarde</option>
                                                <option value="Noite">Noite</option>
                                           </select>
                                            </p>
                                     </div>
                                </div>
                            </div>
                            
                        




                        <!-- div formulario-->
                        <div class = "form-check">
                            <input class="form-check-input" type="checkbox" name ="formulario-epi[]" value="Descaracterização de EPI"   />Descaracterização de EPI <br>
                        
                            <input class="form-check-input" type="checkbox" name ="formulario-epi[]" value="Não utilização dos Disposit. de travamento"/>Não utilização dos Disposit. de travamento <br>
                        
                            <input class="form-check-input" type="checkbox" name = "formulario-epi[]" value="Uso de ferramentas inadequadas"/> Uso de ferramentas inadequadas <br>

                            <input class="form-check-input" type="checkbox" name = "formulario-epi[]"  value="Uso de adornos"/>Uso de adornos <br>
                        
                            <input class="form-check-input" type="checkbox" name = "formulario-epi[]" value="Fumar em local proibido"/>Fumar em local proibido <br>
                        
                            <input class="form-check-input" type="checkbox" name = "formulario-epi[]" value="Não uso de EPI"/>Não uso de EPI <br>
                        
                            <input class="form-check-input" type="checkbox" name = "formulario-epi[]" value="Desrespeito à sinalização de segurança"/>Desrespeito à sinalização de segurança <br><br>
                            
                        </div>
                        <!-- div formulario-->                            
                            <div class="btn-group">   
                                <button class="btn btn-primary" type="submit" value="Salvar">Salvar</button>
                                <a href="lista.php" class="btn btn-primary">Formularios</a>
                            </div>
                            <br>
                  
             </form> 
        </div>
    </main>     
    <footer class="texto">
        <p class="pFooter">  Para melhorar a área de trabalho das empresas, desenvolvemos um projeto web com intuito de armazenar  informações sobre uso indevido de EPIS e postura indevida  do       funcionário em serviço naquele setor e se o próprio possui irregularidades , visando a otimização no armazenamento dos dados de funcionários e setores de empresas que tenham interesse na utilização da aplicação.
        </p>
    </footer>
</body>
</html>