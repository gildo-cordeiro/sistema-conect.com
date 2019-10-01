<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastrar-se</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="screen" href="arquivos/css/style.css" />
    <style>
        @media screen and (max-width: 992px){
            .top{
                margin-top:5px !important;
            }
            .navbar{
                background-color: transparent !important;
            }
            .corpo{
                height:398px !important;
            }
            .titulo{
                display: none;
            }
            .fonte{
                font-size: 15px !important;
            }
        }
        .top{
            margin-top:100px;
        }
        @font-face{
            font-family: "helvetica";
            src: url("arquivos/fontes/helvetica/HELR45W.ttf");
        }
        .btn, .btn-primary{
            background-color:#ff6600 !important;
            border-color:#ff6600 !important;
        }
        .alert, .alert-danger{
           position: absolute; width: 400px; top:75%; z-index: 100;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-transparent navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only"></span>
                <span class="icon-bar bar1" style="background:rgb(0,0,0);"></span>
                <span class="icon-bar bar2" style="background:rgb(0,0,0);"></span>
                <span class="icon-bar bar3" style="background:rgb(0,0,0);"></span>
            </button>
            <a href="index.php" class="navbar-brand hidden-xs hidden-sm" title="Pagina Inicial">
                <img height="60px" src="img/logo.png" alt="logo" style="margin-top:-25px;">
            </a>
        </div>
        <div class="container"> 
            <div class="col-md-11">    
                <div class="collapse navbar-collapse">
                <div class="">
                    <ul class="nav navbar-nav navbar-uppercase navbar-right">
                        <li>
                            <a href="login.php" class="btn btn-primary btn-fill" style="font-family:'Century Gothic';">Entrar</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav> 
<div class="section section-header">
    <div class="parallax">
        <div class="image img-responsive img" style="background-image: url('img/loginIN.jpg');"></div>
            <div class="container top" id="form">
            <div class="row">
                <div class="col-md-4"></div>
                    <div class="col-md-4 offset-md-3" id="loginModal">
                        <div class="modal-body" style="background-color:rgba(255,255,255,0.8);border-radius:15px;">
                            <div class="corpo" style="height:450px; border-radius:10px;">
                            <h2><label class="titulo" style="font-size:50px;font-family:'Century Gothic';">Cadastrar</label></h2>
                                <form action='processarCliente.php' method="post">
                                        <div class="form-group">
                                            <label class="fonte" for="nome" style="font-size:20px;font-family:'Century Gothic';">Primeiro Nome:</label>
                                            <input type="text" style="font-family:'Century Gothic';" class="form-control" id="nome" placeholder="Nome:" name="nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="fonte" style="font-size:20px;font-family:'Century Gothic';">E-mail:</label>
                                            <input type="email" style="font-family:'Century Gothic';" class="form-control" id="email" placeholder="E-mail:" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="fonte" for="senha" style="font-size:20px;font-family:'Century Gothic';">Senha:</label>
                                            <input type="password" style="font-family:'Century Gothic';" class="form-control" id="senha" placeholder="Senha:" name="senha">
                                        </div> 
                                        <button type="submit" class="btn btn-primary col-xs-12 col-md-12" style="font-family:'Century Gothic';color:#ffffff;font-weight:bolder;" name="cadastrar">Cadastrar</button>
                                        <?php
                                    if (isset($_SESSION['erro'])) {
                                        echo "<br>";
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
</div>
<?php include("includes/footer.php"); ?>
<script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
<script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="arquivos/js/modernizr.js"></script>
<script type="text/javascript" src="arquivos/js/gaia.js"></script>
</body>
</html>