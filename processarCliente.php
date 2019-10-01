<?php
include("conexaoBD.php");
session_start();
if (isset($_POST['cadastrar'])) {
    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $senha = isset($_POST['senha'])?$_POST['senha']:"";

    if ($nome != "" && $email != "" && $senha != "") {
        $sql = "INSERT INTO `usuarios` (nome, SobreNome, cpf, tel, cep, estado, endereco, cidade, email, senha) VALUES ('$nome','','','','','','','','$email','$senha')";
        $result = mysqli_query($conn,$sql);

        if($result != 0){
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Usuário cadastrado com suceso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastro.php");

            mysqli_close($conn);
        }else{
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>ERRO - E-mail já cadastrado no sistema<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastro.php");
        }
    }else{
         $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Preecha todos os campos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastro.php");
    }    
}else if (isset($_POST['cadastrarcl'])) {
    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $SobreNome = isset($_POST['SobreName'])?$_POST['SobreName']:"";
    $cpf = isset($_POST['cpf'])?$_POST['cpf']:"";
    $tel = isset($_POST['telefone'])?$_POST['telefone']:"";
    $cep = isset($_POST['cep'])?$_POST['cep']:"";
    $estado = isset($_POST['estado'])?$_POST['estado']:"";
    $ende = isset($_POST['endereco'])?$_POST['endereco']:"";
    $cidade = isset($_POST['cidade'])?$_POST['cidade']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $senha = isset($_POST['senha'])?$_POST['senha']:"";

    if ($nome != "" && $SobreNome != "" && $cpf != "" && $tel != "" && $cep !="" && $estado != "" && $ende != "" && $cidade != "" && $email != "" && $senha != "") {
        $sql = "INSERT INTO `usuarios` (nome, SobreNome, cpf, tel, cep, estado, endereco, cidade, email, senha) VALUES ('$nome','$SobreNome','$cpf','$tel','$cep','$estado','$ende','$cidade','$email','$senha')";

        $rs = mysqli_query($conn,$sql);

        if ($rs != 0) {

            $sql3 = "select *from usuarios";
            $result = mysqli_query($conn,$sql3);
            $tabela = array();
            $h = 0;
            while($regist = mysqli_fetch_array($result)){
                $tabela[$h][0] = $regist['nome'];
                $tabela[$h][1] = $regist['sobreNome'];
                $tabela[$h][2] = $regist['cpf'];
                $tabela[$h][3] = $regist['tel'];    
                $tabela[$h][6] = $regist['endereco'];
                $tabela[$h][7] = $regist['cidade'];
                $tabela[$h][8] = $regist['email'];
                $tabela[$h][9] = $regist['senha'];
                $h++;
            } 
            $_SESSION['cliente'] = $tabela;
            $_SESSION['quant'] = $h;

            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Usuário cadastrado com suceso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastrarGeral.php");
            mysqli_close($conn);
        }else{
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'Erro ao Efetuar o cadastro<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastrarGeral.php");
        }
        mysqli_close($conn);
    }else{
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Preecha todos os campos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastrarGeral.php");
    }
    
}else if (isset($_POST['cadastrarfun'])) {
    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $SobreNome = isset($_POST['SobreName'])?$_POST['SobreName']:"";
    $cpf = isset($_POST['cpf'])?$_POST['cpf']:"";
    $tel = isset($_POST['telefone'])?$_POST['telefone']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $senha = isset($_POST['senha'])?$_POST['senha']:"";
    if (isset($_POST['opcao'])) {
        $opcao = 1;
    }else {
        $opcao = 0;
    }

    if ($nome != "" && $SobreNome != "" && $tel != "" && $cpf != "" && $tel != "" && $email != "" && $senha != "") {
        
        $sql = "INSERT INTO `fun` (nome, SobreNome, cpf, tel, email, senha,adm) VALUES ('$nome','$SobreNome','$cpf','$tel','$email','$senha',$opcao)";

        //echo $sql;
        $rs = mysqli_query($conn,$sql);

        if ($rs != 0) {
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Cadastrado com suceso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastrarGeral.php");
        }else{
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'Erro ao efetuar cadastro<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: cadastrarGeral.php");
        }
        mysqli_close($conn);
    }else{
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Preecha todos os campos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
           header("location: cadastrarGeral.php");
    }   
}else if(isset($_POST["aplicar"])){
    $id = isset($_POST["id"])?$_POST["id"]:"";
    $usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";

    if($id != "" && $usuario != ""){
        $sql = "UPDATE `usuarios` SET `plano`=$id WHERE email='$usuario'";
        //echo $sql;
        $rs = mysqli_query($conn,$sql);
        
        if ($rs != 0) {
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Plano alterado com sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: clientes.php");
        }else{
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Erro ao alterar plano<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location: clientes.php");
        }
    }
}
?>