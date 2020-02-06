e<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Alteração de Cadastro</title>
  </head>
  <body>

    <!-- Dados de conexão no Banco de dados -->

    <?php 

      include "conexao.php";
      // method
      // Pegar o Id do usuário já informado e apresentar no formulário

      $id = $_GET['id'] ?? '';

      //fazer uma busca no banco de dados
      $sql = "SELECT * FROM  pessoas WHERE  cod_pessoa = $id";
      // apresentação desses dados no formulário
      // criação de um vetor
      $dados = mysqli_query($conn, $sql);
      // funçaõ que percorre o vetor resultante //params
      $linha = mysqli_fetch_assoc($dados);



    ?>

    <!-- COMEÇO DO PROJETO - FORMULÁRIO DE CADASTRO  - Página de cadastro -->

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Cadastro</h1>
          <form action="edit_script.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome completo</label>
                                                                                      <!-- elemento -->
                <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>"> 
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco']; ?>">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?> ">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">
            </div>

            <div class="form-group">
                <label for="email">Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento']; ?>">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Salvar Alterações">
                <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa'] ?> ">
            </div>

          </form>
          <a href="index.php" class="btn btn-info"> Voltar para o Início</a>
        </div>
      </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>