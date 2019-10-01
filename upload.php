<?php
include("conexaoBD.php");
session_start();
if (isset($_POST['enviar'])) {
	//Verifica se o botão do <input type="file"> foi pressionado
    $nome = isset($_POST['nome'])?$_POST['nome']:'';
    $SobreNome = isset($_POST['SobreName'])?$_POST['SobreName']:'';
    $tel = isset($_POST['telefone'])?$_POST['telefone']:'';
    $cpf = isset($_POST['cpf'])?$_POST['cpf']:'';
    $cep = isset($_POST['cep'])?$_POST['cep']:'';
    $estado = isset($_POST['estado'])?$_POST['estado']:'';
    $endereco = isset($_POST['endereco'])?$_POST['endereco']:'';
    $cidade = isset($_POST['cidade'])?$_POST['cidade']:'';
	$senha = isset($_POST['senha'])?$_POST['senha']:'';
	
	$tabela = $_SESSION['dados'];
	$qtde_linhas = $_SESSION['i'];
	for ($i=0; $i < $qtde_linhas; $i++) { 
		$usu = $tabela[$i][8];
	}
	$nome_real = $_FILES["arquivo"]["name"];

	$uploaddir = 'img/';

	$path = $uploaddir.$nome;

	if (!file_exists($path)) {
		mkdir($path);
	}

	$uploadfile = $path . "/" .basename($_FILES['arquivo']['name']);

	if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $uploadfile)) {
		$sql = "UPDATE `usuarios` set nome='$nome',SobreNome='$SobreNome',tel='$tel',cep='$cep',estado='$estado',cpf='$cpf',endereco='$endereco',cidade='$cidade',senha='$senha',imagem='$uploadfile' where email='$usu';";
		$result = mysqli_query($conn,$sql);
	
		if ($result != 0) {
			$att2 = "select *from usuarios where email='$usu';";
	        $resultado = mysqli_query($conn,$att2);
	        $tabela = array();
	        $i = 0;
	        while($registro = mysqli_fetch_array($resultado)){
	            $tabela[$i][0] = $registro['nome'];
	            $tabela[$i][1] = $registro['sobreNome'];
	            $tabela[$i][2] = $registro['cpf'];
	            $tabela[$i][3] = $registro['tel'];
	            $tabela[$i][4] = $registro['cep'];
	            $tabela[$i][5] = $registro['estado'];
	            $tabela[$i][6] = $registro['endereco'];
	            $tabela[$i][7] = $registro['cidade'];
	            $tabela[$i][8] = $registro['email'];
				$tabela[$i][9] = $registro['senha'];
				$tabela[$i][10] = $registro['imagem'];
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
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao atualizar<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
			header("location:perfil.php");
		}
	}else{
		header("location:perfil.php");
	}

?>