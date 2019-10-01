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
    <title>Boletos</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style2.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style3.css" />
    <style>
    .cor2{
        color:#ffffff !important;
    }
    .navbar{
        border-bottom:1px solid rgb(0,0,0);
        background-color:rgba(0,0,0);
    }
    @font-face{
        font-family: "helvetica";
        src: url("arquivos/fontes/helvetica/HELR45W.ttf");
    }
    
    .toLem{
            margin-top:-18px !important;
        }
    button{
        color: #ffffff !important;
    }
    </style>
</head>
<body>
<?php 
    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    for ($i=0; $i < $qtde_linhas; $i++) { 
        if ($_SESSION['adm'] == false) {    
            include("includes/menuCliente.php");
            $condicao = "upload/Cliente/";
        } else if ($tabela[$i][6]==false) {
            include("includes/Funcionario.php");
            $condicao = "upload/Funcionario/";
        }else if($tabela[$i][6]==true){
            include("includes/menuADM.php");
            $condicao = "upload/Administrador/";
        }
    }
?>  
<br><br><br>
<div class="section">
<!--Modal-->
<div class="modal fade" id="ModalVia2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="modal-title" id="LabelModal">Emitir 2ª Via</h5>
            </div>
            <div class="col-md-6">
                <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
      </div>
      <div class="modal-body">
        <form action="boleto_bradesco.php" method="post">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Valor:</label>
            <input type="text" class="form-control" name="valor" id="valor" placeholder="Informe o  valor do boleto">
          </div>
        <label class="pull-left toLem" style="font-family:'Century Gothic';color:red !important;">Min R$: 2,30</label>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger" data-dismiss="modal" style="color:#ffffff;">Cancelar</button>
        <button onclick="verificarNumero();" name="concluir" type="submit" class="btn btn-primary"style="color:#ffffff;background-color:green !important;border-color:green !important;">Gerar Boleto</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Modal-->
    <div class="container">
    <?php 
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
        <form action="ProcessarPlanos.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <h1><label style="font-family:'Century Gothic';">Gerar Boletos</label></h1>
                    <p class="description" id="desc" style="font-family:'Century Gothic';">Escolha o tipo de boleto que precisa emitir.</p>
                </div> 
            </div>
            <div class="container">
                <hr>
                <div class="col-md-3">
                    <h3><label style="font-family:'Century Gothic';">Boleto Vencido</label></h3>
                </div>
                <div class="col-md-5">
                    <p class="description" style="font-family:'Century Gothic';">Use esta opção para emitir a segunda via de boleto da sua renegociação de dívida realizada.</p>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="concluir" class="btn btn-danger col-md-6" style="margin-left: 20%; padding: 10px 10px 10px; color:#ffffff;font-family:'Century Gothic';text-transform:capitalize;letter-spacing: 2px;">
                    Emitir</button>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="col-md-3">
                    <h3><label style="font-family:'Century Gothic';">Emissão de 2ª via</label></h3>
                </div>
                <div class="col-md-5">
                    <p class="description" style="font-family:'Century Gothic';">Aqui você pode emitir a segunda via dos seus boletos emitidos.</p>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="concluir" class="btn btn-danger col-md-6" style="margin-left: 20%; padding: 10px 10px 10px; color:#ffffff;font-family:'Century Gothic';text-transform:capitalize;letter-spacing: 2px;">
                    Emitir</button>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="col-md-3">
                    <h3><label style="font-family:'Century Gothic';">Boleto eletrônico - Email</label></h3>
                </div>
                <div class="col-md-5">
                    <p class="description" style="font-family:'Century Gothic';">Se você recebeu uma notificação por email, clique aqui para emitir seu boleto..</p>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="concluir" class="btn btn-danger col-md-6" style="margin-left: 20%; padding: 10px 10px 10px; color:#ffffff;font-family:'Century Gothic';text-transform:capitalize;letter-spacing: 2px;">
                    Emitir</button>
                </div>
            </div>
            <hr>
        </div>
    </form>
</div>
<?php include("includes/footer.php"); ?>

<script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
    <script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="arquivos/js/modernizr.js"></script>
    <script type="text/javascript" src="arquivos/js/gaia.js"></script>
    <script type="text/javascript" src="arquivos/js/boleto.js"></script>
    <script type="text/javascript" src="arquivos/js/bootbox.min.js"></script>
</body>
</html>