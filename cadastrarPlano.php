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
    <title>Planos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style2.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style3.css" />
    <style>
    .cor2{
        color:#ffffff !important;
    }
    .navbar{
        border-bottom:1px solid rgba(0,0,0,0.3);
        background-color:rgb(0,0,0);
    }
    @font-face{
        font-family: "helvetica";
        src: url("arquivos/fontes/helvetica/HELR45W.ttf");
    }
    </style>
</head>
<body>
<?php
if ($_SESSION['UserNivel']==3) {    
    include("includes/menuCliente.php");
} else if ($_SESSION['UserNivel']==2) {
    include("includes/menuFuncionario.php");
}else if($_SESSION['UserNivel']==1){
    include("includes/menuADM.php");
}else{
    header("location:index.php");
}
?>
<br><br><br>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h2><img height="40px" src="img/glyphicons-341-globe.png"> Planos Disponiveis</h2>
                    <hr>
                </div> 
            </div>
            
            <form action='processarCliente.php' method="post">
                <div class="col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="mb" style="font-size:15px;">Mega Bytes</label>
                                <input type="text" class="form-control" id="mb"  style="font-weight:bolder;" name="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="email" style="font-size:15px;">Preço</label>
                                <input type="text" class="form-control text-center" id=""  style="font-weight:bolder;" name="">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="senha" style="font-size:15px;">Centavos</label>
                                <input type="text" class="form-control text-center" style="font-weight:bolder;" id="" placeholder="" name="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="email" style="font-size:15px;">Periodo</label>
                                <select name="" id="" class="form-control"  style="font-weight:bolder;">
                                    <option value="Mês" >Mês</option>
                                    <option value="Ano" >Ano</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2"> 
                            <button type="submit" class="btn btn-primary col-xs-12 col-md-12" style="color:#ffffff;font-weight:bolder;" name="cadastrar">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <?php include("includes/footer.php")?>
    <script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
    <script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="arquivos/js/modernizr.js"></script>
    <script type="text/javascript" src="arquivos/js/gaia.js"></script>
</body>
</html>