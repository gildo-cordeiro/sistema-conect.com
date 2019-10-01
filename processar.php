<?php
session_start();
if (isset($_POST["entrar"])) {
    $login = isset($_POST["email"])?$_POST["email"]:"";
    $senha = isset($_POST["senha"])?$_POST["senha"]:"";
    $adm = isset($_POST["adm"]);
    $_SESSION['adm'] = $adm;

    if ($login != "" && $senha != "") {
    	include("conexaoBD.php");
    	if ($adm==true) {
    		$sql = "select *from fun where email='$login' and senha='$senha';";
	        $resultado = mysqli_query($conn,$sql);
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
	            $adm = $registro['adm'];
	            $i++;
	        }
	        if ($i!=0) {
	        	if ($adm == 1) {
	        		$_SESSION['admin'] = true;
	        	}else{
	        		$_SESSION['admin'] = false;
				}
				############################################################
				$planos = "SELECT  *FROM `planos`;";
				$resultadot = mysqli_query($conn,$planos); 
				$tabelaT = array();
				$t = 0;
				while($registro = mysqli_fetch_array($resultadot)){
					$tabelaT[$t][0] = $registro['id'];
					$t++;
				} 
				$_SESSION['planos'] = $tabelaT;
				$_SESSION['t'] = $t;

				$planosR = "SELECT  *FROM `planos` WHERE `tipo` = 'radio'";
				$resultadoR = mysqli_query($conn,$planosR); 
				$tabelaR = array();
				$r = 0;
				while($registro = mysqli_fetch_array($resultadoR)){
					$tabelaR[$r][0] = $registro['id'];
					$tabelaR[$r][1] = $registro['mega'];
					$tabelaR[$r][2] = $registro['preco'];
					$tabelaR[$r][3] = $registro['down'];
					$tabelaR[$r][4] = $registro['up'];	
					$tabelaR[$r][5] = $registro['desconto'];
					$tabelaR[$r][6] = $registro['tipo'];
					$r++;
				} 
				$_SESSION['planos_radio'] = $tabelaR;
				$_SESSION['r'] = $r;
				################################################

				$planosC = "SELECT  *FROM `planos` WHERE `tipo` = 'Cabo'";
				$resultadoC = mysqli_query($conn,$planosC); 
				$tabelaC = array();
				$c = 0;
				while($registro = mysqli_fetch_array($resultadoC)){
					$tabelaC[$c][0] = $registro['id'];
					$tabelaC[$c][1] = $registro['mega'];
					$tabelaC[$c][2] = $registro['preco'];
					$tabelaC[$c][3] = $registro['down'];
					$tabelaC[$c][4] = $registro['up'];   
					$tabelaC[$c][5] = $registro['desconto'];
					$tabelaC[$c][6] = $registro['tipo'];
					$c++;
				} 
				$_SESSION['planos_cabo'] = $tabelaC;
				$_SESSION['c'] = $c;

	            $_SESSION['autenticar']=true;
	            $_SESSION['dados'] = $tabela;
				$_SESSION['i'] = $i;
				
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
					$tabela[$h][10] = $registro['imagem'];
		            $h++;
		        } 
	            $_SESSION['cliente'] = $tabela;
				$_SESSION['quant'] = $h;
				
				//-------------------------------------------------------

				$sql4 = "select *from fun";
		        $result = mysqli_query($conn,$sql4);
		        $tabela = array();
		        $f = 0;
		        while($regist = mysqli_fetch_array($result)){        
					$tabela[$f][0] = $regist['nome'];
		            $tabela[$f][1] = $regist['sobreNome'];
		            $tabela[$f][2] = $regist['cpf'];
		            $tabela[$f][3] = $regist['tel'];	
		            $tabela[$f][4] = $regist['email'];
		            $tabela[$f][6] = $regist['adm'];
		            $f++;
		        } 
	            $_SESSION['func'] = $tabela;
	            $_SESSION['quantF'] = $f;
	            header("location:perfil.php");
	            mysqli_close($conn);
	        }else{
	            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Login ou senha incorretos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	            header("location: login.php");
	        }
    	}else if($adm==false){
    		$sql = "select *from usuarios where email='$login' and senha='$senha';";
	        $resultado = mysqli_query($conn,$sql);
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
				$tabela[$i][10] = $registro['plano'];
				$tabela[$i][10] = $registro['imagem'];
	            $i++;
	        }
	        if ($i!=0) {
	            $_SESSION['autenticar']=true;
	            $_SESSION['dados'] = $tabela;
	            $_SESSION['i'] = $i;
			}
			$id = $_SESSION["id"];
			$tabela = $_SESSION['dados'];
			$qtde_linhas = $_SESSION['i'];

			for ($i=0; $i < $qtde_linhas; $i++) {
				$usuario = $tabela[$i][8]; 
			}

			$plan = "SELECT u.plano,p.mega,p.preco,p.down,p.up,p.desconto,p.tipo FROM usuarios u, planos p WHERE u.plano=p.id and u.email='$usuario'";
			$rs = mysqli_query($conn,$plan); 
			$table = array();
			$p = 0;
			while($registro = mysqli_fetch_array($rs)){
				$table[$p][0] = $registro[0];
				$table[$p][1] = $registro[1];
				$table[$p][2] = $registro[2];
				$table[$p][3] = $registro[3];
				$table[$p][4] = $registro[4];	
				$table[$p][5] = $registro[5];
				$table[$p][6] = $registro[6];
				$p++;
			} 
			$_SESSION['plan'] = $table;
			$_SESSION['p'] = $p;
			
			$planos = "SELECT  *FROM `planos`;";
			$resultadot = mysqli_query($conn,$planos); 
			$tabelaT = array();
			$t = 0;
			while($registro = mysqli_fetch_array($resultadot)){
				$tabelaT[$t][0] = $registro['id'];
				$t++;
			} 
			$_SESSION['planos'] = $tabelaT;
			$_SESSION['t'] = $t;

			$planosR = "SELECT  *FROM `planos` WHERE `tipo` = 'radio'";
			$resultadoR = mysqli_query($conn,$planosR); 
			$tabelaR = array();
			$r = 0;
			while($registro = mysqli_fetch_array($resultadoR)){
				$tabelaR[$r][0] = $registro['id'];
				$tabelaR[$r][1] = $registro['mega'];
				$tabelaR[$r][2] = $registro['preco'];
				$tabelaR[$r][3] = $registro['down'];
				$tabelaR[$r][4] = $registro['up'];	
				$tabelaR[$r][5] = $registro['desconto'];
				$tabelaR[$r][6] = $registro['tipo'];
				$r++;
			} 
			$_SESSION['planos_radio'] = $tabelaR;
			$_SESSION['r'] = $r;
			################################################

			$planosC = "SELECT  *FROM `planos` WHERE `tipo` = 'Cabo'";
			$resultadoC = mysqli_query($conn,$planosC); 
			$tabelaC = array();
			$c = 0;
			while($registro = mysqli_fetch_array($resultadoC)){
				$tabelaC[$c][0] = $registro['id'];
				$tabelaC[$c][1] = $registro['mega'];
				$tabelaC[$c][2] = $registro['preco'];
				$tabelaC[$c][3] = $registro['down'];
				$tabelaC[$c][4] = $registro['up'];   
				$tabelaC[$c][5] = $registro['desconto'];
				$tabelaC[$c][6] = $registro['tipo'];
				$c++;
			} 
			$_SESSION['planos_cabo'] = $tabelaC;
			$_SESSION['c'] = $c;

	            //echo  $_SESSION['nome'];
            header("location:perfil.php");
            mysqli_close($conn);
    	}
    }else {
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Campos vazios<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("location: login.php");
            //echo "Campos vazios";
    }
}else{
    header("location: login.php");
}
?>