<?php 
// Iniciaa sessão em cada pagina 
if(!isset($_SESSION))session_start();

$nivel_necessario = 0;

if (isset($_SESSION['UserNivel']) != $nivel_necessario) {
    if (!isset($_SESSION['auntenticar'])) {
        session_destroy();
        header("location: login.php");
    }else{
        session_destroy();
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="PT-BR">

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
    <link href="arquivos/css/scroll.css" rel="stylesheet"/>
    <style>
        @font-face{
            font-family: "Century Gothic";
        }
        .navbar{
            background-color: rgba(255,255,255,0.8);
            /*border-bottom: 1px solid rgba(0,0,0,0.3);*/
        }
        
        .nav{
            color:#000000 !important;
        }
        
        .btn, .btn-primary{
            background-color:#ff6600 !important;
            border-color:#ff6600 !important;
        }
    </style>
</head>

<body id="cor">
    <?php include("includes/menu.php") ?>
    <div class="section section-header" id="home">
        <div class="parallax">
            <div class="image" style="background-image: url('img/copia.jpeg');"></div>
            <div class="container">
                <!--<div class="content">
                    <div class="title-area">
                        <h1 class="title-modern" style="letter-spacing: 40px;"> CONECT.COM</h1>
                    </div>
                </div>-->
            </div>
        </div>
    </div>

    <div class="section anime" id="somos">
        <div class="col-lg-8">
            <h2 class="mb-5"><span class="span1">UMA EMPRESA</span><br><span class="span2" style="color:#ff3300;">PENSADA PRA VOCÊ</span></h2>
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <p class="apresentacao" style="font-family:'Century Gothic';">Sua empresa e sua residência merecem a Conect.com. Tenha a melhor da banda larga do mercado, 
                    não procure mais tudo que você necessita está aqui! Na Conect.com, procuramos lhe atender da melhor forma possível.
                    Além disso, contamos com os melhores preços do mercado, possibilitando assim, alta qualidade para nossos clientes e 
                    colaboradores.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-our-team-freebie">
        <div class="parallax filter filter-color-black" id="planos" style="height:600px;">
            <div class="image" style="background-image:url('img/imagem1.jpg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="team">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                    <div class="anime" style="text-shadow: 5px 5px 5px rgba(0,0,0,0.1)">
                                        <div class="col-md-6 col-xs-12 col-sm-4">
                                            <div class="card card-member" style="border-bottom: 5px solid rgb(255,102,0);">
                                                <span class="spanPlan" style="font-family:'Century Gothic';">R$ 25 DE DESCONTO</span>
                                                <div class="content" style="border-left: 1px solid rgba(0,0,0,0.1);border-top: 1px solid rgba(0,0,0,0.1);">
                                            <!--cabeçalho---->
                                                    <div class="col-xs-12 col-sm-4 col-md-8">
                                                        <p style="font-size:30px;color:#ff3300;font-family:'Century Gothic';"><strong>15 Mega</strong></p>
                                                        <p style="color:#000000;"><strong><img src="img/glyphicons-207-ok.png" style="height:10px;font-family:'Century Gothic';"> Conect WiFi</strong> Fora de casa</p>
                                                        <p style="color:#000000;"><strong><img src="img/glyphicons-207-ok.png" style="height:10px;font-family:'Century Gothic';"> Modem</strong> com WiFi</p>
                                                        <p style="color:#000000;"><strong><img src="img/glyphicons-207-ok.png" style="height:10px;font-family:'Century Gothic';"> Conect Play</strong></p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 col-md-4"> 
                                                        <p style="font-size:30px; color:#000000;font-family:'Century Gothic';"><strong>39<sup>,90</strong></p>
                                                        <p style="margin-top:-47px; margin-left:40px;color:#000000;font-family:'Century Gothic';"><strong>\MÊS</strong><sup></p>
                                                        <a href="#planos" class="btn btn-primary" style="font-family:'Century Gothic';color:#ffffff;background-color:#ff3300 !important;border-color:#ff3300 !important;" onclick="alert('Faça Login ou cadastre-se para obter o plano.');">
                                                        Ver Todos
                                                        </a>
                                                    </div>
                                                <!----------->
                                                <br><br><br><br><br><br><br><br><br>
                                                <div class="card-body">
                                                    <p class="card-text" style="text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';">Nos Combos de 104,90/mês</p>
                                                    <p class="card-text" style="text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';">Download: até 25 Mbps. Upload: até 3Mbps</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="anime" style="text-shadow: 5px 5px 5px rgba(0,0,0,0.1)">
                                        <div class="col-md-6 col-xs-12 col-sm-4">
                                            <div class="card card-member" style="border-bottom: 5px solid rgb(255,102,0);">
                                                <span class="spanPlan" style="font-family:'Century Gothic';">R$ 25 DE DESCONTO</span>
                                                <div class="content" style="border-left: 1px solid rgba(0,0,0,0.1);border-top: 1px solid rgba(0,0,0,0.1);">
                                            <!--cabeçalho---->
                                                    <div class="col-xs-12 col-sm-4 col-md-8">
                                                        <p style="font-size:30px;color:#ff3300;font-family:'Century Gothic';"><strong>25 Mega</strong></p>
                                                        <p style="color:#000000;"><strong><img src="img/glyphicons-207-ok.png" style="height:10px;font-family:'Century Gothic';"> Conect WiFi</strong> Fora de casa</p>
                                                        <p style="color:#000000;"><strong><img src="img/glyphicons-207-ok.png" style="height:10px;font-family:'Century Gothic';"> Modem</strong> com WiFi</p>
                                                        <p style="color:#000000;"><strong><img src="img/glyphicons-207-ok.png" style="height:10px;font-family:'Century Gothic';"> Conect Play</strong></p>
                                                    </div>
                                                        <div class="col-xs-12 col-sm-4 col-md-4"> 
                                                        <p style="font-size:30px; color:#000000;font-family:'Century Gothic';"><strong>49<sup>,90</strong></p>
                                                        <p style="margin-top:-47px; margin-left:40px;color:#000000;font-family:'Century Gothic';"><strong>\MÊS</strong><sup></p>
                                                        <a href="#planos" class="btn btn-primary" style="font-family:'Century Gothic';color:#ffffff;background-color:#ff3300 !important;border-color:#ff3300 !important;" onclick="alert('Faça Login ou cadastre-se para obter o plano.');">
                                                        Ver Todos
                                                        </a>
                                                    </div>
                                                <!----------->
                                                <br><br><br><br><br><br><br><br><br>
                                                <div class="card-body">
                                                    <p class="card-text" style="text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';">Nos Combos de 104,90/mês</p>
                                                    <p class="card-text" style="text-align:center;color:black;font-weight: bolder;font-family:'Century Gothic';">Download: até 25 Mbps. Upload: até 3Mbps</p>
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
</div>
    <?php include("includes/footer.php"); ?>
    <script src="arquivos/js/jquery.min.js" type="text/javascript"></script>
<script src="arquivos/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="arquivos/js/modernizr.js"></script>
<script type="text/javascript" src="arquivos/js/gaia.js"></script>
<script type="text/javascript" src="arquivos/js/scroll.js"></script>
<script type="text/javascript" src="arquivos/js/scroll2.js"></script>
</body>
</html>
