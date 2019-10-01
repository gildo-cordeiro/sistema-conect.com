<nav class="navbar navbar-transparent navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only"></span>
                <span class="icon-bar bar1" style="background:rgb(190,190,190);"></span>
                <span class="icon-bar bar2" style="background:rgb(190,190,190);"></span>
                <span class="icon-bar bar3" style="background:rgb(190,190,190);"></span>
            </button>
            <a href="indexCliente.php" class="navbar-brand hidden-xs hidden-sm" title="Pafina Inicial">
                <img height="60px" src="img/logo.png" alt="logo" style="margin-top:-25px;">
            </a>
        </div>
        <div class="container">        
            <div class="navbar-collapse">
                <div class="">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="planos.php" class="nav nav-link cor2" style="font-family:'Century Gothic';">
                                Mudar de Plano
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="boletos.php" class="nav nav-link cor2" style="font-family:'Century Gothic';">
                                Gerar Boleto
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle nav nav-link cor2" data-toggle="dropdown"  id="nav" style="font-family:'Century Gothic';">
                                Ajuda
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="help.php" class="nav-link" style="font-family:'Century Gothic';">Perguntas Frequentes</a>
                                </li>
                                <li>
                                    <a href="assistencia.php" class="nav-link" style="font-family:'Century Gothic';">Solicitar Assistência Tecnica.</a>
                                </li>
                            </ul>
                        </li>
                        </ul>  
                        <style>
                            .perfil:hover{
                                color:#ff3300 !important;
                            }
                        </style>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <strong class="nav cor2" style="font-size:20px;">
                                <span>
                                <img  height="25px" style="border-radius:25px;" src="
                                <?php 
                                    if(!isset($_SESSION['dados'])){
                                        echo "img/user2.png";
                                    }else{
                                        $tabela = $_SESSION['dados'];
                                        $qtde_linhas = $_SESSION['i'];
                                        for ($i=0; $i < $qtde_linhas; $i++) {
                                            echo $tabela[$i][10];
                                        }
                                    }
                                ?>"></span>
                                <span class="perfil" style="font-family:'Century Gothic';"><?php
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) { 
                                    echo $tabela[$i][0]; 
                                }
                                ?>
                                </span>
                            </strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="navbar-login">
                                        <div class="col-lg-12">
                                            <p class="text-center">
                                                <span><img src="<?php 
                                                     if(!isset($_SESSION['dados'])){
                                                        echo "img/user2.png";
                                                    }else{
                                                        $tabela = $_SESSION['dados'];
                                                        $qtde_linhas = $_SESSION['i'];
                                                        for ($i=0; $i < $qtde_linhas; $i++) {
                                                            echo $tabela[$i][10];
                                                        }
                                                    }
                                                ?>" class="img-circle img-thumbnail" style="border-color:#ff6600;" alt="avatar">
                                            </span>
                                            </p>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p class="text-left" style="color:#ff3300;font-family:'Century Gothic';font-size:30px;"><strong><?php  $tabela = $_SESSION['dados'];
                                                $qtde_linhas = $_SESSION['i'];
                                                for ($i=0; $i < $qtde_linhas; $i++) { 
                                                    echo $tabela[$i][0]; 
                                                }
                                                ?></strong>
                                            </p>
                                            <p class="text-left md" style="color:#ff3300;font-family:'Century Gothic';font-size:15px;margin-top:-30px;"><?php  $tabela = $_SESSION['dados'];
                                                $qtde_linhas = $_SESSION['i'];
                                                for ($i=0; $i < $qtde_linhas; $i++) { 
                                                    echo $tabela[$i][8]; 
                                                }?>
                                                </p>
                                            <p class="text-left">
                                                <a href="perfil.php" class="btn btn-primary btn-block btn-sm" style="color:#ffffff;font-family:'Century Gothic';">Perfil</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="navbar-login navbar-login-session">
                                        <div class="col-md-12">
                                            <p>
                                                <a href="logout.php" class="btn btn-danger btn-block" style="color:#ffffff;font-family:'Century Gothic';margin-top:-10px;">Encerrar Sessão</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
</nav>
