<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <!--O CÓDIGO ABAIXO PARA EVITAR QUE O SITE VÁ PARA OS MECANISMOS DE BUSCA-->
  <meta name="googlebot" value="noindex,nofollow">
  <meta name="robots" value="noindex,nofollow">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ENVIO DE RECEITA DIGITAL</title>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <!-- Link para o CSS do Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBw3VJ8mWGlAGnPyqP_fWtBOgI4QmFmmp4",
    authDomain: "receitadigital-91243.firebaseapp.com",
    projectId: "receitadigital-91243",
    storageBucket: "receitadigital-91243.appspot.com",
    messagingSenderId: "516263144928",
    appId: "1:516263144928:web:d3c3786e59de287ab60f85",
    measurementId: "G-6F361G0JZL"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>

  <!-- Início do Menu -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">ENVIO DE RECEITA DIGITAL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/index.php">Página Inicial <span class="sr-only">(esta página)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/consulta.php">CONSULTAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/medicos.php">MÉDICOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contato.php">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Fim do Menu -->

  <!-- Conteúdo do Site -->
  <div class="container mt-4">
    <?php
        // Conectar ao banco de dados
        $conexao = mysqli_connect("localhost", "usuariodb", "senhadb", "bancodedados");
        if (!$conexao) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        // Consulta para recuperar os dados do banco de dados
        $consulta = "SELECT * FROM formulario";
        $result = mysqli_query($conexao, $consulta);

        

        // Fechar a conexão com o banco de dados
        mysqli_close($conexao);
        ?>

    <table class="tg">
<thead>
  <tr>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <th class="tg-0lax"><label for="pdf">Arquivo PDF:</label></th>
    <th class="tg-0lax"><input type="file" name="pdf" id="pdf" required></th>
    
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax"><label for="imagem">Imagem PNG:</label></td>
    <td class="tg-0lax"><input type="file" name="imagem" id="imagem"></td>
  </tr>
  <tr>
    <td class="tg-0lax"><label for="codigo_receita">Código de Receita:</label></td>
    <td class="tg-0lax"><input type="text" name="codigo_receita" id="codigo_receita"></td>
  </tr>
  <tr>
    <td class="tg-0lax"><label for="nome_medicamento">Nome do Medicamento:</label></td>
    <td class="tg-0lax"><input type="text" name="nome_medicamento" id="nome_medicamento"></td>
  </tr>
  <tr>
    <td class="tg-0lax"><label for="lote">Lote:</label></td>
    <td class="tg-0lax"><input type="text" name="lote" id="lote"></td>
  </tr>
  <tr>
    <td class="tg-0lax"><label for="laboratorio">Laboratório:</label></td>
    <td class="tg-0lax"><input type="text" name="laboratorio" id="laboratorio"></td>
  </tr>
  <tr>
    <td class="tg-0lax"><label for="nome_paciente">Nome do Paciente:</label></td>
    <td class="tg-0lax"><input type="text" name="nome_paciente" id="nome_paciente"></td>
  </tr>
  <tr>
    <td class="tg-0lax"> <label for="cpf_rg">CPF / RG:</label></td>
    <td class="tg-0lax"><input type="text" name="cpf_rg" id="cpf_rg"></td>
  </tr>
  <tr>
    <td class="tg-0lax"><label for="endereco">Endereço:</label></td>
    <td class="tg-0lax"><input type="text" name="endereco" id="endereco"></td>
  </tr>
  <tr>
    <td class="tg-0lax"><label for="telefone">Número de Telefone:</label></td>
    <td class="tg-0lax"><input type="text" name="telefone" id="telefone"></td>
  </tr>

    <tr>
        <td class="tg-0lax" class=""><input type="submit" value="Enviar"></form>
        </td>
    </tr>
</tbody>

</table>

    <div id="clock"></div>

    <script>

        function updateTime() {
            var now = new Date();
            var date = now.toLocaleDateString();
            var time = now.toLocaleTimeString();

            document.getElementById("clock").innerHTML = "Data: " + date + "<br>Hora: " + time;

            setTimeout(updateTime, 1000); // Atualizar a cada segundo
        }

        updateTime(); // Iniciar a atualização da hora
    </script>

  <!-- Scripts do Bootstrap (JavaScript) e jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.0/dist/umd/popper.min.js"></script>

  <script>
    // Animar o menu quando um link for clicado
    $(document).ready(function() {
      $('a.nav-link').click(function() {
        $('html, body').animate({
          scrollTop: $($(this).attr('href')).offset().top
        }, 800);
      });
    });
  </script>

</body>
</html>
