<!DOCTYPE html>
<html>
<head>
      <!--O CÓDIGO ABAIXO PARA EVITAR QUE O SITE VÁ PARA OS MECANISMOS DE BUSCA-->
  <meta name="googlebot" value="noindex,nofollow">
  <meta name="robots" value="noindex,nofollow">
    <title>PÁGINA DE BUSCA DE RECEITAS</title>
    <link rel="stylesheet" type="text/css" href="/css/style2.css">
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
      <a class="navbar-brand" href="#">PÁGINA DE BUSCA DE RECEITAS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/index.php">Página Inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/consulta.php">CONSULTAS<span class="sr-only"> (esta página)</span></a>
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

    <h2 class="text-aling">PÁGINA DE BUSCA DE RECEITAS</h2>

    <form action="" method="GET">
        <input type="text" name="search" placeholder="NOME, CPF OU CODIGO DA RECEITA">
        <input type="submit" value="Buscar">
    </form>
    <br>
    <br>

    <?php
    // Definir o fuso horário desejado
    date_default_timezone_set('America/Sao_Paulo');

    // Conectar ao banco de dados
    $conexao = mysqli_connect("localhost", "usuariodb", "senhadb", "bancodedados");
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Verificar se uma busca foi realizada
    if (isset($_GET['search'])) {
        $search = $_GET['search'];

        // Consulta para buscar os resultados no banco de dados
        $consulta = "SELECT * FROM formulario WHERE 
                        codigo_receita LIKE '%$search%' OR 
                        nome_medicamento LIKE '%$search%' OR 
                        lote LIKE '%$search%' OR 
                        laboratorio LIKE '%$search%' OR 
                        nome_paciente LIKE '%$search%' OR 
                        cpf_rg LIKE '%$search%' OR 
                        endereco LIKE '%$search%' OR 
                        telefone LIKE '%$search%' OR 
                        data_envio LIKE '%$search%'";

        $result = mysqli_query($conexao, $consulta);

        // Exibir os resultados somente se houver algum
        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                    <tr>
                        <th>Código da Receita</th>
                        <th>Nome do Medicamento</th>
                        <th>Lote</th>
                        <th>Laboratório</th>
                        <th>Nome do Paciente</th>
                        <th>CPF / RG</th>
                        <th>Endereço</th>
                        <th>Número de Telefone</th>
                        <th>Data de Envio</th>
                        <th>Arquivo PDF</th>
                    </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['codigo_receita']}</td>";
                echo "<td>{$row['nome_medicamento']}</td>";
                echo "<td>{$row['lote']}</td>";
                echo "<td>{$row['laboratorio']}</td>";
                echo "<td>{$row['nome_paciente']}</td>";
                echo "<td>{$row['cpf_rg']}</td>";
                echo "<td>{$row['endereco']}</td>";
                echo "<td>{$row['telefone']}</td>";
                echo "<td>" . date('d/m/Y H:i:s', strtotime($row['data_envio'])) . "</td>";
                echo "<td><a href='{$row['pdf']}' target='_blank'>ABRIR RECEITA</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<ceter><p>Nenhuma receita encontrada.</p></ceter>";
        }
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($conexao);
    ?>
    <br>
    <br>
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

</body>
</html>
