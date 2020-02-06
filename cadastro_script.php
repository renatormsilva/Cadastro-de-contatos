<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Cadastro</title>
  </head>
  <body>

    <!-- COMEÇO DO PROJETO - FORMULÁRIO DE CADASTRO  portas lógicas da aplicação-->

    <div class="container">
      <div class="row">

            <?php 
                // incluir o conteúdo de outro script
                include "conexao.php";
                // Método POST
                // Receber dados no "name" do formulário e atribuir a uma variável

                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $data_nascimento = $_POST['data_nascimento'];

                // upload de fotos
                // vetor dentro de um vetor
                // elemento // atribuição do formulário
                // metodo

                $foto = $_FILES['foto'];
                // nome da foto no banco de dados criado
                $nome_foto = mover_foto($foto);

                if ($nome_foto == 0) {
                  $nome_foto = null;
                }

                // Comando - mysql - INSERT  - inserir os dados e armazenar em uma variável
                // Atributo

                $sql = "INSERT INTO `pessoas` (`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto` ) VALUES ('$nome','$endereco',
                    '$telefone','$email','$data_nascimento', '$nome_foto')";
                // Função de inserir no banco ! params de conexão e  instrução (vetor / dados)
                // condicional para testes !
                // função reservada 
               if (mysqli_query($conn, $sql)) {   
                mensagem("$nome cadastrado com sucesso!", 'success');
               } else
                mensagem("$nome NÃO cadastrado!", 'danger');


            ?>
            <hr>    
            <a href="index.php" class="btn btn-primary btn-lg btn-block">Voltar</a>
      </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>