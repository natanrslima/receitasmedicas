<?php
// Conectar ao banco de dados
$conexao = mysqli_connect("localhost", "usuariodb", "senhadb", "bancodedados");
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Recuperar os dados do formulário
$codigo_receita = $_POST['codigo_receita'];
$nome_medicamento = $_POST['nome_medicamento'];
$lote = $_POST['lote'];
$laboratorio = $_POST['laboratorio'];
$nome_paciente = $_POST['nome_paciente'];
$cpf_rg = $_POST['cpf_rg'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$data_envio = date('Y-m-d H:i:s');

// Verificar se um arquivo PDF foi enviado
if ($_FILES['pdf']['name'] != "") {
    // Diretório de destino para salvar o arquivo PDF
    $diretorio_pdf = "uploads/";
    $pdf_nome = $_FILES['pdf']['name'];
    $pdf_caminho = $diretorio_pdf . $pdf_nome;

    // Mover o arquivo PDF para o diretório de destino
    move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf_caminho);
} else {
    $pdf_caminho = null; // Define um valor padrão para o PDF se nenhum arquivo for enviado
}

// Verificar se uma imagem PNG foi enviada
if ($_FILES['imagem']['name'] != "") {
    // Diretório de destino para salvar a imagem PNG
    $diretorio_imagem = "uploads/img/";
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_caminho = $diretorio_imagem . $imagem_nome;

    // Mover a imagem PNG para o diretório de destino
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem_caminho);
} else {
    $imagem_caminho = null; // Define um valor padrão para a imagem se nenhum arquivo for enviado
}

// Inserir os dados no banco de dados
$inserir_dados = "INSERT INTO formulario (codigo_receita, nome_medicamento, lote, laboratorio, nome_paciente, cpf_rg, endereco, telefone, data_envio, pdf, imagem) VALUES ('$codigo_receita', '$nome_medicamento', '$lote', '$laboratorio', '$nome_paciente', '$cpf_rg', '$endereco', '$telefone', '$data_envio', '$pdf_caminho', '$imagem_caminho')";
if (mysqli_query($conexao, $inserir_dados)) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro ao enviar os dados: " . mysqli_error($conexao);
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;

?>