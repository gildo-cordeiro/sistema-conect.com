<?php
include("conexaoBD.php");
session_start();
if (!isset($_SESSION['autenticar'])) {
    session_destroy();
    header("location: login.php");
}else{
    if(!$_SESSION['autenticar']){
        session_destroy();
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Perfil</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<link href="arquivos/css/bootstrap.css" rel="stylesheet" />
<link href="arquivos/css/gaia.css" rel="stylesheet"/>
<link href="arquivos/css/style.css" rel="stylesheet"/>
<link href="arquivos/css/style2.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="arquivos/css/style3.css" />
<script  type="text/javascript" src="arquivos/js/MascarasCampo.js"></script>

<style>
    @media screen and (max-width:992px){
        .paneMagin{
            margin-left:0px !important;
        }
    }
    .cor2{
        color:#ffffff !important;
    }
    .navbar{
        border-bottom:1px solid rgb(0,0,0);
        background-color:rgba(0,0,0);
    }
    @font-face{
        font-family: "Century Gothic";
    }
    .alert, .alert-danger{
       position: absolute; width: 400px; top: 83%; z-index: 100;
    }
    .btn, .btn-primary{
        background-color:#ff6600 !important;
        border-color:#ff6600 !important;
    }
    td{
        color:#000000 !important;
    }
    .section > .esconder {
        height: 250px; /* limita a altura aqui, assim irá limitar o texto*/
        overflow: hidden;
    }
    .section > .mostra{
        height: auto; /* limita a altura aqui, assim irá limitar o texto*/
    }
    .titulo{
        font-family:'Century Gothic';
        background-color:#ff3300;
        color:#ffffff;font-size:12pt;
        font-weight:bolder;
    }
</style>
    
<script>
    function mostrar() {
      var classe = document.getElementById('tabela').className;
      if (classe == 'esconder') {
        document.getElementById('tabela').className = 'mostra';
        document.getElementById('identificador').innerHTML = 'Ocultar';
      }else{
        document.getElementById('tabela').className = 'esconder';
        document.getElementById('identificador').innerHTML = 'Ver mais';
      }
    } 
    function mostrarFun() {
      var classe = document.getElementById('tabelafun').className;
      if (classe == 'esconder') {
        document.getElementById('tabelafun').className = 'mostra';
        document.getElementById('identificadorFun').innerHTML = 'Ocultar';
      }else{
        document.getElementById('tabelafun').className = 'esconder';
        document.getElementById('identificadorFun').innerHTML = 'Ver mais';
      }
    }
</script>
</head>
<body>
<?php 
    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    for ($i=0; $i < $qtde_linhas; $i++) { 
        if (isset($tabela[$i][8])) {    
            include("includes/menuCliente.php");
            $condicao = "upload/Cliente/";
        } else if ($_SESSION['admin']==false) {
            include("includes/menuFuncionario.php");
            $condicao = "upload/Funcionario/";
        }else if($_SESSION['admin']==true){
            include("includes/menuADM.php");
            $condicao = "upload/Administrador/";
        }
    }
?>  
<br><br><br>
<hr>
<div class="container">
<div class="row">
    <div class="col-sm-10">
        <h1>
            <label  style="font-family:'Century Gothic';">
            <?php
               $tabela = $_SESSION['dados'];
                $qtde_linhas = $_SESSION['i'];
                for ($i=0; $i < $qtde_linhas; $i++) {
                    if ($tabela[$i][0]!="" || $tabela[$i][1]!=""){
                        echo $tabela[$i][0]." ".$tabela[$i][1]; 
                    }else{
                         echo "\"???\"";
                    }
                }
               ?>
            </label>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 paneMagin">
        <ul class="nav nav-tabs">
            <li class="active"><a style="font-family:'Century Gothic';" data-toggle="tab" href="#per">Perfil</a></li>
            <?php 
            if (isset($_SESSION['admin'])) {
                echo " <li><a style='font-family:'Century Gothic';' data-toggle='tab' href='#historico'>Historico</a></li>";
            }
            ?>
            <!--<li><a data-toggle="tab" href="#pla">Cadastrar Planos</a></li>-->
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="per">
                <hr>
                <?php
                    $tabela = $_SESSION['dados'];
                    $qtde_linhas = $_SESSION['i'];
                    for ($i=0; $i < $qtde_linhas; $i++) { 
                        if (isset($tabela[$i][8])) {
                            include("includes/AtualizarPerfil.php");
                            include("includes/UsuPerfil.php");
                        } else if ($_SESSION['admin']==false) {
                            include("includes/AtualizarPerfilFun.php");
                            include("includes/FunPerfil.php");

                        }else if($_SESSION['admin']==true){
                            include("includes/AtualizarPerfilFun.php");
                            include("includes/FunPerfil.php");
                        }
                    } 
                ?> 
            <div class="tab-pane" id="historico">                 
                <hr>
                <?php include("includes/historicoCliente.php");?>
                <hr>
            </div><!--/tab-pane-->
            
            <div class="tab-pane" id="pla">               	
                <hr>
                   
                <hr>    
            </div>
            </div>
        </div><!--/tab-content-->
    </div><!--/col-9-->
</div><!--/row-->      
<?php include("includes/footer.php"); ?>                                 
</body>
<script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
<script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="arquivos/js/modernizr.js"></script>
<script type="text/javascript" src="arquivos/js/gaia.js"></script> 
<script>
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
    readURL(this);
    });
});
</script>
</html>