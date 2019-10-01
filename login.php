<?php
session_start();
session_destroy();
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="arquivos/css/gaia.css">
    <link rel="stylesheet" href="arquivos/css/style.css">
    <link rel="stylesheet" href="arquivos/css/style2.css">
    <link rel="stylesheet" href="arquivos/css/barra.css"> 
    <style>
    @media screen and (max-width: 992px){
        .top{
            margin-top:5px !important;
        }
        .titulo{
            display: none;
        }
        .volt{
            margin-left: 75% !important;
        }
    }
    @media (min-width: 520px) and (max-width: 992px){
        .volt{
            margin-left: 85% !important;
        }
    }
        .top{
            margin-top:100px;
        }
        @font-face{
            font-family: "Century Gothic";
        }
        .alert, .alert-danger{
           position: absolute; width: 400px; top: 83%; z-index: 100;
        }
    </style> 
  <title>Login - Conect.com</title>
</head>
<body>
    <div class="modal fade" id="ModalVia2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="modal-title" id="LabelModal">Recuperar senha</h5>
                </div>
                <div class="col-md-6">
                    <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
          </div>
          <div class="modal-body">
            <form action="RecuperarSenha.php" method="post">
              <div class="form-group">
                <label for="message-text" class="col-form-label">E-mail</label>
                <input type="email" class="form-control" name="mail" id="valor" placeholder="Ex.: gildo@gmail.com" required>
                <label class="col-form-label" style="margin-top: -20px;"><code style="margin-top: -10px;">Insira o E-mail cadastrado para receber a senha por E-mail</code></label>
              </div>
          </div>
          <div class="modal-footer">
            <!--<button type="reset" class="btn btn-danger" data-dismiss="modal" style="color:#ffffff;background-color:red !important;border-color:red !important;">Cancelar</button>-->
            <button name="rec" type="submit" class="btn btn-outline-success btn-lg btn-block"style="color:green;border-color:green !important;">Enviar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--Modal-->
    <div class="section section-header">
        <div class="parallax">
            <div class="image img-responsive img" style="background-image: url('img/loginIN.jpg');"></div>
                <div class="container" id="form">
                   <label class="volt"><a href="index.php" type="button" role="button" class="btn btn-primary" style="font-weight:bolder;margin-top:10px;position:absolute;color:#ffffff;z-index:100;font-family:'Century Gothic';">VOLTAR</a></label> 
                    <div class="row">
                    <div class="col-md-4"></div>
                        <div class="col-md-4 offset-md-3 top" id="loginModal">
                            <div class="modal-body" style="background-color:rgba(255,255,255,0.8);border-radius:15px;">
                                <h2><label class="titulo" style="font-size:50px;font-family:'Century Gothic';">Entrar</label></h2>
                                    <form action='processar.php' method="post">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="email" style="font-size:20px;font-family:'Century Gothic';">E-mail:</label>
                                                <input type="email" style="font-family:'Century Gothic';" class="form-control" placeholder="E-mail:" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="senha" style="font-size:20px;font-family:'Century Gothic';">Senha:</label>
                                                <input type="password" style="font-family:'Century Gothic';" class="form-control" id="senha" placeholder="Senha:" name="senha">
                                            </div>
                                            <button type="submit" class="btn btn-primary col-xs-12 col-md-12" style="font-weight:bolder;color:#ffffff;background-color:#ff6600 !important;border-color:#ff6600 !important;font-family:'Century Gothic';" name="entrar">Entrar</button>
                                            <label class="pull-left toLem" style="font-family:'Century Gothic';"><input type="checkbox" name="adm">Funcionário</label>
                                            <!--a href="#" class="pull-right" style="color:#ff3300; font-size:13px;font-weight: bold;font-family:'Century Gothic';" data-toggle="modal" data-target="#ModalVia2" data-whatever="@mdo">Esqueci minha senha</a><span class="clearfix"></span>-->
                                            <a href="help.php" class="pull-right" style="margin-top:5px;color:#ff3300; font-size:13px;font-weight: bold;font-family:'Century Gothic';">Ajuda? clique aqui!</a><span class="clearfix"></span>
                                            <a href="cadastro.php" class="pull-right" style="margin-top:5px;color:#ff3300; font-size:13px;font-weight: bold;font-family:'Century Gothic';">Não tenho conta</a><span class="clearfix"></span>
                                        </div>
                                        <?php
                                            if (isset($_SESSION['erro'])) {
                                            echo $_SESSION['erro'];
                                            unset($_SESSION['erro']);
                                            }
                                        ?>
                                    </form>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include("includes/footer.php")?>
<script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
<script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="arquivos/js/modernizr.js"></script>
<script type="text/javascript" src="arquivos/js/gaia.js"></script>
<script type="text/javascript" src="arquivos/js/pace.min.js"></script>

<script>

</script>
</body>
</html>
