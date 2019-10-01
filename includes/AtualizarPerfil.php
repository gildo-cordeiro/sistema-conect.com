<div class="modal fade" id="atualizar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="modal-title" id="LabelModal">Atualizar dados</h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" style="color: red;" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-sm-2">       
                        <div class="text-center">
                            <img src="<?php 
                                if(!isset($_SESSION['dados'])){
                                    echo "img/user2.png";
                                }else{
                                    $tabela = $_SESSION['dados'];
                                    $qtde_linhas = $_SESSION['i'];
                                    for ($i=0; $i < $qtde_linhas; $i++) {
                                        echo $tabela[$i][10];
                                    }
                                }
                            ?>" class="avatar img-circle img-thumbnail" style="border-color:#ff6600;" alt="avatar">
                            <br><br>
                        </div>
                    </div>  
                    <div class="col-md-5"></div>
                </div>  
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form  class="form" action="upload.php" enctype="multipart/form-data" method="post" style="text-align: left;" name="formulario">
                            <input type="file" class="text-center center-block file-upload" name="arquivo">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo "<br>";
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                                }
                            ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <script>
                                function ValidarCampos1(){
                                    var nome = document.getElementById('nome').value;var name = document.getElementById('Name').value;
                                    var cpf = document.getElementById('cpf').value;var telefone = document.getElementById('telefone').value;
                                    if ((nome == "") || (Name == "")  || (cpf == "") || (telefone == "")) {
                                        alert('Preencha todos os campos!');
                                        return false;
                                    }else{
                                        ValidarCampos2();
                                        ValidarCampos3();
                                        return true;
                                    }
                                }
                            </script>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><h3 style="font-family:'Century Gothic';">Dados Pessoas:</h3></label>
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="nome">Nome:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="sujeito" placeholder="Ex: Gildo" name="nome" 
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][0];
                                }       
                                ?>" 
                                >
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="Name">Sobre Nome:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="Name" placeholder="Ex: Cordeiro Duarte" name="SobreName"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][1];
                                }       
                                ?>"
                                >
                                </div>
                                <div class="form-group cpf-mask" style="font-family:'Century Gothic';">
                                <label for="cpf">CPF:</label>
                                <input type="text" disabled="disabled" style="font-family:'Century Gothic';" class="form-control" id="cpf" placeholder="Ex: 000.000.000-00" name="cpf" maxlength=14 onKeyup="MaskCPF(this);"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][2];
                                }       
                                ?>"
                                >
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="telefone">Telefone:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="telefone" placeholder="Ex: (DDD)XXXXXXXXX" name="telefone" maxlength=11 onKeyup="num(this);"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][3];
                                }       
                                ?>"
                                >
                                </div> 
                            </div>
                            <script>
                                function ValidarCampos2(){
                                    var cep = document.getElementById('cep').value; var estado = document.getElementById('estado').value; var endereco = document.getElementById('endereco').value;
                                    var cidade = document.getElementById('cidade').value;
                                    if ((cep == "") || (estado == "") || (endereco == "") || (cidade == "")) {
                                        alert('Preencha todos os campos!');
                                        return false;
                                    }else{
                                        return true;
                                    }
                                }
                            </script>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><h3 style="font-family:'Century Gothic';">Localização:</h3></label>
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="cep">CEP:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="cep" placeholder="Ex: 00000-000" name="cep" maxlength=9 onKeyup="MaskTelCEP(this);"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][4];
                                }       
                                ?>"
                                >
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="estado">Estado:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="estado" placeholder="Ex: RN" name="estado"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][5];
                                }       
                                ?>">
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="endereco">Endereço:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="endereco" placeholder="Ex: Rua 52 de José, 667, Centro" name="endereco"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][6];
                                }       
                                ?>"
                                >
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="cidade">Cidade:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="cidade" placeholder="Ex: New York" name="cidade"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][7];
                                }       
                                ?>"
                                >
                                </div>
                            </div>
                            <script>
                                function ValidarCampos3(){
                                    var email = document.getElementById('email').value; var senha = document.getElementById('senha').value; 
                                    var confirSenha = document.getElementById('confirSenha').value; 
                                    if ((email == "") || (senha == "") || (confirSenha == "")) {
                                        alert('Preencha todos os campos!');
                                        return false;
                                    }else{
                                        if (senha != confirSenha) {
                                            alert('Campos de senhas com valores diferentes.');
                                            return false;
                                        }else{
                                            return true;
                                        }
                                    }
                                }
                            </script>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><h3 style="font-family:'Century Gothic';">Dados de Login:</h3></label>
                                </div> 
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="email">E-mail:</label>
                                <input type="email" disabled="disabled" style="font-family:'Century Gothic';" class="form-control" id="email" placeholder="E-mail:" name="email"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][8];
                                }       
                                ?>"
                                >
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="senha">Senha:</label>
                                </script>
                                <input id="texto" style="font-family:'Century Gothic';" type="text" class="form-control" id="senha" placeholder="Password:" name="senha"
                                value="<?php 
                                $tabela = $_SESSION['dados'];
                                $qtde_linhas = $_SESSION['i'];
                                for ($i=0; $i < $qtde_linhas; $i++) {
                                    echo $tabela[$i][9];
                                }       
                                ?>"
                                >
                                </div>
                                <div class="form-group" style="font-family:'Century Gothic';">
                                <label for="confirSenha">Confirma Senha:</label>
                                <input type="text" style="font-family:'Century Gothic';" class="form-control" id="confirSenha" placeholder="Password:" name="confirSenha">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger" style="background-color:red !important;border-color:red !important;color:#ffffff;">Cancelar</button>
                                     <button onclick="verificarNumero();" name="enviar" type="submit" class="btn btn-primary"style="color:#ffffff;">Atualizar</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>