<div class="row">
    <div class="col-sm-12 col-md-12">       
        <div class="text-center">
            <img src="<?php 
                if(!isset($_SESSION['dados'])){
                    echo "img/user2.png";
                }else{
                    $tabela = $_SESSION['dados'];
                    $qtde_linhas = $_SESSION['i'];
                    for ($i=0; $i < $qtde_linhas; $i++) {
                        echo $tabela[$i][7];
                    }
                }
            ?>" class="avatar img-circle img-thumbnail" style="border-color:#ff6600;" alt="avatar">
            <br><br>
        </div>
    </div> 
    <div class="col-sm-12 col-md-4">
        <?php 
	        echo "<ul class='list-group'  style='font-family:'Century Gothic';'>";
	        $tabela = $_SESSION['dados'];
	        $qtde_linhas = $_SESSION['i'];
	        for ($i=0; $i < $qtde_linhas; $i++) {
	            echo "<li class='list-group-item' style='font-size:18px;'>";
	                if ($tabela[$i][0]!="" || $tabela[$i][1]!=""){
                        echo "<label style='font-size:10px;position:absolute;margin-top:-7px;'>Nome</label>";
	                    echo $tabela[$i][0]." ".$tabela[$i][1]; 
	                }else{
	                     echo "\"???\"";
	                }
	            echo "</li>";
            }
	        "</ul>";
        ?>  
    </div> 
    <div class="col-sm-12 col-md-4">
        <?php 
            echo "<ul class='list-group'  style='font-family:'Century Gothic';'>";
            $tabela = $_SESSION['dados'];
            $qtde_linhas = $_SESSION['i'];
            for ($i=0; $i < $qtde_linhas; $i++) {
                echo "<li class='list-group-item' style='font-size:18px;'>";
                    if ($tabela[$i][3]!=""){
                        echo "<label style='font-size:10px;position:absolute;margin-top:-7px;'>Telefone</label>";
                        echo $tabela[$i][3]; 
                    }else{
                         echo "\"Telefone\"";
                    }
                echo "</li>";
            }
            "</ul>";
        ?>  
    </div> 
    <div class="col-sm-12 col-md-4">
        <?php 
            echo "<ul class='list-group'  style='font-family:'Century Gothic';'>";
            $tabela = $_SESSION['dados'];
            $qtde_linhas = $_SESSION['i'];
            for ($i=0; $i < $qtde_linhas; $i++) {
                echo "<li class='list-group-item' style='font-size:20px;'>";
                    if ($tabela[$i][2]!=""){
                        echo "<label style='font-size:10px;position:absolute;margin-top:-7px;'>CPF</label>";
                        echo $tabela[$i][2]; 
                    }else{
                         echo "\"CPF\"";
                    }
                echo "</li>";
            }
            "</ul>";
        ?>  
    </div> 
    <div class="col-sm-12 col-md-4">
        <?php 
            echo "<ul class='list-group'  style='font-family:'Century Gothic';'>";
            $tabela = $_SESSION['dados'];
            $qtde_linhas = $_SESSION['i'];
            for ($i=0; $i < $qtde_linhas; $i++) {
                echo "<li class='list-group-item' style='font-size:20px;'>";
                    if ($tabela[$i][4]!=""){
                        echo "<label style='font-size:10px;position:absolute;margin-top:-7px;'>E-mail</label>";
                        echo $tabela[$i][4]; 
                    }else{
                         echo "\"E-mail\"";
                    }
                echo "</li>";
            }
            "</ul>";
        ?>  
    </div> 
    <div class="col-sm-12 col-md-4">
        <?php 
            echo "<ul class='list-group'  style='font-family:'Century Gothic';'>";
            $tabela = $_SESSION['dados'];
            $qtde_linhas = $_SESSION['i'];
            for ($i=0; $i < $qtde_linhas; $i++) {
                echo "<li class='list-group-item' style='font-size:20px;'>";
                    if ($tabela[$i][5]!=""){
                        echo "<label style='font-size:10px;position:absolute;margin-top:-7px;'>Senha</label>";
                        echo $tabela[$i][5]; 
                    }else{
                         echo "\"Senha\"";
                    }
                echo "</li>";
            }
            "</ul>";
        ?>  
    </div> 
</div>
<div class="row">
        <div class="col-sm-12 col-md-12">
            <button class="btn btn-primary" data-toggle="modal" data-target="#att" style="font-size:15px;color: #ffffff;text-transform:capitalize;">Atualizar</button>
        </div>
    </div>
<hr>
</div>