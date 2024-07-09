<?php
session_start();
include_once('conexao.php');

// Verificar se o usuário clicou no botão
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg');
if ($SendCadImg) {
    // Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_DEFAULT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
    $qualproduto = filter_input(INPUT_POST, 'qualproduto', FILTER_DEFAULT);
    $marcaemodelo = filter_input(INPUT_POST, 'marcaemodelo', FILTER_DEFAULT);

    

    // Verificar se os campos não estão vazios
    if (empty($nome) || empty($email) || empty($telefone) || empty($endereco) || empty($qualproduto) || empty($marcaemodelo)) {
        $_SESSION['msg'] = "<p style='color:red;'>Por favor, preencha todos os campos.</p>";
        header("Location: index.php");
        exit();
    }

    try {
        // Inserir no BD
        $result_img = "INSERT INTO registros (nome, email, telefone, endereco, qualproduto, marcaemodelo) VALUES (:nome, :email, :telefone, :endereco, :qualproduto, :marcaemodelo)";
        $insert_msg = $conn->prepare($result_img);
        $insert_msg->bindParam(':nome', $nome);
        $insert_msg->bindParam(':email', $email);
        $insert_msg->bindParam(':telefone', $telefone);
        $insert_msg->bindParam(':endereco', $endereco);
        $insert_msg->bindParam(':qualproduto', $qualproduto);
        $insert_msg->bindParam(':marcaemodelo', $marcaemodelo);

        // Verificar se os dados foram inseridos com sucesso
        if ($insert_msg->execute()) {
            $_SESSION['msg'] = "<p style='color:white;'>Obrigado por ajudar nosso museu! Seus dados foram salvos com sucesso, em breve entraremos em contato!</p><br>";
        } else {
            $_SESSION['msg'] = "<p><span style='color:red;'>Erro ao enviar seus dados!</span></p>";
        }
    } catch (PDOException $e) {
        // Capturar e exibir erros de execução da consulta
        $_SESSION['msg'] = "<p><span style='color:red;'>Erro ao enviar seus dados: " . $e->getMessage() . "</span></p>";
    }
    header("Location: index.php");
    exit();
} else {
    $_SESSION['msg'] = "<p><span style='color:red;'>Você deve enviar os dados pelo formulário.</span></p>";
    header("Location: index.php");
    exit();
}
?>