<?php 
include("conexaoBD.php");
    session_start();
    if (!$_SESSION['autenticar']) {
        header ("location:login.php");
        session_destroy();
    }    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Conect.com</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="arquivos/css/bootstrap.css" rel="stylesheet" />
    <link href="arquivos/css/gaia.css" rel="stylesheet"/>
    <link href="arquivos/css/style.css" rel="stylesheet"/>
    <link href="arquivos/css/style2.css" rel="stylesheet"/>
    <link href="arquivos/css/style3.css" rel="stylesheet"/>
    <link rel="stylesheet" href="arquivos/css/barra.css"> 
    <style>
        @font-face{
            font-family: "Century Gothic";
        }
        .navbar{
            background-color: rgba(255,255,255,0.8);
            border-bottom: 1px solid rgba(0,0,0,0.3);
        }
        
        .nav{
            color:#000000 !important;
        }
        .cor2{
            font-weight: bolder !important;
        }
        p{
            color:#000000;
        }
        #check{
            visibility:hidden;
        }
    </style>
</head>
<body>
    
<body id="cor">
    <?php include("includes/menuCliente.php") ?>
    <div class="section section-header" id="home">
        <div class="parallax filter filter-color-grey">
            <div class="image" style="background-image: url('img/mulher&dog.jpg');"></div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h1 class="title-modern" style="letter-spacing: 40px;font-family:'Century Gothic';"> CONECT.COM</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <div class="section anime" id="fibra">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                <h2 style="float:left;font-family:'Century Gothic';">Conheça a Fibra</h2>
                    <p style="line-height:35px;float:left;width:90%;font-size:16px;font-family:'Century Gothic';">Fibra ótica é a rede de transmissão de dados mais rápida do mundo. Com ela,
                     é possível atingir velocidade, qualidade e capacidade para criar uma experiência de TV e internet 
                     incrível. Assista a filmes e séries online, jogue sem delay e navegue na internet em alta 
                     velocidade..</p>
                </div>
                <div class="col-md-6">
                    <img width="100%" style="border-radius:10px;" src="img/girl.jpg">
                </div>
            </div>
            <hr style="border-radius:100px;border-bottom:3px solid #ff3300;margin-top:6%;">
        </div>
    </div>

    <div class="section section-our-team-freebie">
        <div class="parallax filter filter-color-black" id="planos" style="height:600px;">
            <div class="image" style="background-image:url('img/imagem1.jpg')">
            </div>
            <div class='container'>
                <div class='row'>
                    <h1 class="title">Seu Plano</h1>
                    <h4 class="subtitle description" style="margin-top:-50px;">Conectado a você!</h4>
                  
                    <div class="esconder">
                        <div class='col-md-12'>
                            <div>
                            <?php
                            if (isset($_SESSION['plan'])) {
                            $planos_cabo = $_SESSION['plan'];
                            $qtde = $_SESSION['p'];
                            for ($i=0; $i < $qtde; $i++) { 
                            echo "
                                <div class='col-md-6 col-xs-12 col-sm-4 col-md-offset-3'>
                                    <div class='card card-member' style='border-bottom: 5px solid rgb(255,102,0);'>
                                        <span class='spanPlan' style='font-family:'Century Gothic';'>R$ ".$planos_cabo[$i][5]." DE DESCONTO</span>
                                        <div class='content' style='border-left: 1px solid rgba(0,0,0,0.1);border-top: 1px solid rgba(0,0,0,0.1);'>
                                        <!--cabeçalho---->
                                        <form action='planos2.php' method='post'>
                                            <div class='col-xs-12 col-sm-4 col-md-8'>
                                                <p style='font-size:30px;color:#ff3300;font-family:'Century Gothic';'><strong>".$planos_cabo[$i][1]."</strong></p>
                                                <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> WiFi</strong> Fora de casa</p>
                                                <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Modem</strong> com WiFi</p>
                                                <p style='font-family:'Century Gothic';'><strong><img src='img/glyphicons-207-ok.png' style='height:10px;'> Conect Play</strong></p>                                            </div>
                                            <div class='col-xs-12 col-sm-4 col-md-4'> 
                                            <br>
                                            <p style='font-size:50px;font-family:'Century Gothic';'><strong>".$planos_cabo[$i][2]."</strong></p>
                                            <p style='font-size:20px;margin-top:-55px; margin-left:55px;font-family:'Century Gothic';'><strong>\MÊS</strong><sup></p>
                                           
                                            </div>  
                                            </form>
                                            <br><br><br><br><br><br><br><br><br>
                                                <div class='card-body'>
                                                    <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';position:absolute;'>Nos Combos de 104,90/mês</p>
                                                    <p class='card-text' style='text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';'>Download: até ".$planos_cabo[$i][3]."Mbps. Upload: até ".$planos_cabo[$i][4]."Mbps</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                    }
                                }
                                    ?>
                                    </div>
                                </div> 
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
<script type="text/javascript" src="arquivos/js/scroll.js"></script>
<script type="text/javascript" src="arquivos/js/scroll2.js"></script>

<script type="text/javascript" src="arquivos/js/pace.min.js"></script>
</body>
</html>
