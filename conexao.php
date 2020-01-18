<?php 
	$server = "localhost";
	$user = "root";
	$pass ="vr81002745r";
	$bd = "empresa";

	 	if ( $conn = mysqli_connect($server, $user, $pass, $bd)) {
			// echo "Conectado!";
		} else 
			echo "Erro!";

     # função de mostrar spam na tela

		function mensagem($texto, $tipo) {
			echo "<div class='alert alert-$tipo' role='alert'>
  					$texto 
				  </div>";
		}

		function mostra_data($data) {
			$d = explode('-', $data);
			$escreve = $d[2] ."/" .$d[1] ."/" .$d[0];
			return $escreve;
		}

		function mover_foto($vetor_foto) {
			$vtipo = explode("/", $vetor_foto['type']);

			$tipo =  $vtipo[0] ?? ''  ;

			$extensao = $vtipo[1] ?? '' ;

			if ((!$vetor_foto['error']) and ($vetor_foto['size'] ) and ($tipo == "image")) {
				$nome_arquivo = date('Ymdhms') .$extensao;
				move_uploaded_file($vetor_foto['tmp_name'], "img/".$nome_arquivo);
				return $nome_arquivo;
			} else{
				return 0;
			}
		}

 ?>