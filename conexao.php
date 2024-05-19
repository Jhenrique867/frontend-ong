<?php
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $categoria = $_POST['categoria'] ?? ''; 
    $link = $_POST['link'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    $host = 'localhost'; 
    $banco = 'cadastro';
    $user = 'root'; 
    $senha_user = ''; 

    $con = mysqli_connect($host, $user, $senha_user, $banco);

    if (!$con) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $stmt = $con->prepare("INSERT INTO clientes (nome, email, categoria, link, descricao) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $email, $categoria, $link, $descricao);

    if ($stmt->execute()) {
        echo "Ong cadastrada com sucesso";
    } else {
        echo "Erro ao cadastrar Ong: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>
