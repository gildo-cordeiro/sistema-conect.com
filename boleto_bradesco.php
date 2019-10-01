<?php
session_start();
if (!isset($_SESSION['autenticar'])) {
    session_destroy();
    header("location: boletos.php");
}else{
    if(!$_SESSION['autenticar']){
        session_destroy();
        header("location: boletos.php");
    }
}
if(isset($_POST['enviar']) || isset($_SESSION['tableN'])){
    
    include("conexaoBD.php");
    $novo = $_SESSION['tableN'];
    $qtde = $_SESSION['n'];
    var_dump($novo);
    for ($i=0; $i < $qtde; $i++) { 
        $valor = $novo[$i][2];
        $desconto = $novo[$i][5];
    }

    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    for ($i=0; $i < $qtde_linhas; $i++) { 
        $Nome =$tabela[$i][0];
        $SobreNome = $tabela[$i][1];
        $CPF = $tabela[$i][2];
        $Tel = $tabela[$i][3];
        $Cep = $tabela[$i][4];
        $Estado = $tabela[$i][5];
        $Endereco = $tabela[$i][6];
        $Cidade = $tabela[$i][7];
        $email = $tabela[$i][8];
        $Senha = $tabela[$i][9];
    }
    if ($Nome != "" && $SobreNome != "" && $CPF != "" && $Tel != "" && $Cep != "" && $Estado != "" &&  $Endereco != "" && $Cidade != "" && $email!="") {
        if (is_numeric($valor)) {
            if ($valor > "2.30") {
                $dias_de_prazo_para_pagamento = 5;
                $taxa_boleto = 0;
                $data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
                $valor_cobrado = $valor-$desconto; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
                $valor_cobrado = str_replace(",", ".",$valor_cobrado);
                $valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
                $desconto=$desconto;

                $dadosboleto["nosso_numero"] = "75896452";  // Nosso numero sem o DV - REGRA: M�ximo de 11 caracteres!
                $dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];    // Num do pedido ou do documento = Nosso numero
                $dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
                $dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
                $dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
                $dadosboleto["valor_boleto"] = $valor_boleto;   // Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula
                $dadosboleto["desconto"] =  $desconto;

                // DADOS DO SEU CLIENTE
                $dadosboleto["sacado"] = $Nome." ".$SobreNome;
                $dadosboleto["endereco1"] = $Endereco;
                $dadosboleto["endereco2"] = $Cidade." - ".$Estado." -  CEP: ".$Cep;

                // INFORMACOES PARA O CLIENTE
                $dadosboleto["demonstrativo1"] = "Pagamento de Compra no E-comercio Conect.com";
                $dadosboleto["demonstrativo2"] = "Mensalidade referente a <br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
                $dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";
                $dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
                $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
                $dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: Conect@gmail.com";
                $dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Conect.com - www.Conect.com.br";

                // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
                $dadosboleto["quantidade"] = "001";
                $dadosboleto["valor_unitario"] = $valor_boleto;
                $dadosboleto["aceite"] = "";
                $dadosboleto["especie"] = "R$";
                $dadosboleto["especie_doc"] = "DS";


                // ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


                // DADOS DA SUA CONTA - Bradesco
                $dadosboleto["agencia"] = "1100"; // Num da agencia, sem digito
                $dadosboleto["agencia_dv"] = "0"; // Digito do Num da agencia
                $dadosboleto["conta"] = "0102003";  // Num da conta, sem digito
                $dadosboleto["conta_dv"] = "4";     // Digito do Num da conta

                // DADOS PERSONALIZADOS - Bradesco
                $dadosboleto["conta_cedente"] = "0102003"; // ContaCedente do Cliente, sem digito (Somente N�meros)
                $dadosboleto["conta_cedente_dv"] = "4"; // Digito da ContaCedente do Cliente
                $dadosboleto["carteira"] = "06";  // C�digo da Carteira: pode ser 06 ou 03

                // SEUS DADOS
                #$dadosboleto["identificacao"] = "BoletoPhp - Código Aberto de Sistema de Boletos";
                $dadosboleto["cpf_cnpj"] = "707.545.684-90";
                #$dadosboleto["endereco"] = $Endereco;
                #$dadosboleto["cidade_uf"] = $Cidade;
                $dadosboleto["cedente"] = "Conect.com";
                
                // N�O ALTERAR!
                include("includes/funcoes_bradesco.php");
                include("includes/layout_bradesco.php");
            }else{
               $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Valor menor que o permitido! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
               //header("location: boletos.php");
            }
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Informe um numero no campo valor<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            //header("location: boletos.php");
        }
    }else{
         $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Preencha todo o formulario do perfil antes de Gerar um boleto.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        //header("location: boletos.php");
    }
}else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>O botão enviar não foi pressionado! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
   // header("location: boletos.php");
}
// DADOS DO BOLETO PARA O SEU CLIENTE
?>
