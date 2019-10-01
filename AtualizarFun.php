<?php
include("conexaoBD.php");
session_start();
if (isset($_POST['enviar'])) {
    //Verifica se o botão do <input type="file"> foi pressionado
    $nome = isset($_POST['nome'])?$_POST['nome']:'';
    $SobreNome = isset($_POST['SobreName'])?$_POST['SobreName']:'';
    $tel = isset($_POST['telefone'])?$_POST['telefone']:'';
    $cpf = isset($_POST['cpf'])?$_POST['cpf']:'';
    $senha = isset($_POST['senha'])?$_POST['senha']:'';


    $tabela = $_SESSION['dados'];
    $qtde_linhas = $_SESSION['i'];
    for ($i=0; $i < $qtde_linhas; $i++) { 
        $usu = $tabela[$i][4]; 
        $email = $tabela[$i][2];
    }
    $nome_real = $_FILES["arquivo"]["name"];

    $uploaddir = 'img/';

    $path = $uploaddir.$nome;

    if (!file_exists($path)) {
        mkdir($path);
    }

    $uploadfile = $path . "/" .basename($_FILES['arquivo']['name']);
    echo $uploadfile;
    
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $uploadfile)) {
        $att = "UPDATE `fun` set nome='$nome',SobreNome='$SobreNome',cpf='$cpf',tel='$tel',senha='$senha',imagem='$uploadfile' where email='$usu';";
        $resul = mysqli_query($conn,$att);
        echo $att;
        if ($resul != 0) {
            $att2 = "select *from fun where email='$usu';";
            $resultado = mysqli_query($conn,$att2);
            $tabela = array();
            $i = 0;
            while($registro = mysqli_fetch_array($resultado)){
                $tabela[$i][0] = $registro['nome'];
                $tabela[$i][1] = $registro['sobreNome'];
                $tabela[$i][2] = $registro['cpf'];
                $tabela[$i][3] = $registro['tel'];
                $tabela[$i][4] = $registro['email'];
                $tabela[$i][5] = $registro['senha'];
                $tabela[$i][7] = $registro['imagem'];
                $i++;
            }
            $_SESSION['dados'] = $tabela;
            $_SESSION['i'] = $i;
            header("location:perfil.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao atualizar<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            header("location:perfil.php");
        }
    }else{
       header("location:perfil.php");
    }
}else{
    header("location:perfil.php");
}

?>