<?php 

	// Declaração das variáveis de conexão
	
	$server = "localhost";
	$user = "root";
	$pass ="vr81002745r";
	$bd = "empresa";

		## mysqli_connect - Fazer a conexão! -- condição - teste de conexão
		## atribuir a conexão a variável $conn
	 	if ( $conn = mysqli_connect($server, $user, $pass, $bd)) {
			// echo "Conectado!"; ---- teste de conexão!
		} else 
			echo "Erro!";

	 # função com params definidos em cadastro_script 
	 # exibir um alerta com cores diferentes 
	 # tipo - succes/danger

		function mensagem($texto, $tipo) {
			echo "<div class='alert alert-$tipo' role='alert'>
  					$texto 
				  </div>";
		}

		// inverter as datas - UEA - BR
		// cria um vetor - 2 params - o que quer separar e onde

		function mostra_data($data) {
			$d = explode('-', $data); 
			$escreve = $d[2] ."/" .$d[1] ."/" .$d[0];
			return $escreve;
		}
		
		// 3 finalidades
		// checar se o arquivo é uma imagem
		// explode - transformar a string em array - manipulação.
		function mover_foto($vetor_foto) {
			$vtipo = explode("/", $vetor_foto['type']);

			$tipo =  $vtipo[0] ?? ''  ;

			$extensao = $vtipo[1] ?? '' ;
			// evitar erros de substituição
			// condição foto =! erro and foto = size and type = image --
			// novo nome - contatenação da data + extensão
			if ((!$vetor_foto['error']) and ($vetor_foto['size'] ) and ($tipo == "image")) {
				$nome_arquivo = date('Ymdhms') .$extensao;
				// 2 params, o elemento do vetor e o destino 
				// pasta do servidor para a pasta img
				move_uploaded_file($vetor_foto['tmp_name'], "img/".$nome_arquivo);
				return $nome_arquivo;
			} else{
				return 0;
			}
		}

 ?>