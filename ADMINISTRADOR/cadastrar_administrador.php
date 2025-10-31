<?php

//Iniciar a sessão para gerenciamento do usuário
session_start();

//Importar a configuração de conexão com o banco de dados
require_once('conexao.php');

//Verificar se o administrador está logado
if(!isset($_SESSION['admin_logado'])){
    header('Location:login.php');
    exit();
 }
//Bloco que será executado quando o formulário abaixo for submetido com os dados do administrador que desejamos que seja inserido no banco de dados
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //pega os valores do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;//esse comando é uma maneira concisa de dizer: "Se o campo ativo do formulário foi marcado, defina $ativo como 1. Caso contrário, defina como 0."

    //Inserindo os dados do novo administrador digitados nos campos do formulário no banco de dados
    try{
        $sql = "INSERT INTO ADMINISTRADOR (ADM_NOME, ADM_EMAIL, ADM_SENHA, ADM_ATIVO) VALUES (:nome, :email, :senha, :ativo);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindParam(':ativo', $ativo, PDO::PARAM_STR);

        $stmt->execute();

        $adm_id = $pdo->lastInsertId();

        echo "<p style='color:green;'>Administrador cadastrado com sucesso! ID: " . $adm_id . "</p> ";
        } catch (PDOException $e){
            echo "<p style='color:red;'>Erro ao cadastrar Administrador: " . $e->getMessage() . "</p>";
        
}
}
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>
</head>
<body>
    <h2>Cadastro de Administrador</h2>
    <form action="" method="post" enctype="multipart/form-data">

        <!-- Campos do formulario para inserir informaçoes do administrador -->
         <label for="">Nome:</label>
         <input type="text" name="nome" id="nome" required>
         <p>
         <label for="email">Email:</label>
         <input type="email" name="email" id="email" require>
         <p>
         <label for="senha">SENHA:</label>
         <input type="password" name="senha" id="senha" require>
         <p>
         <label for="ativo">Ativo:</label>
         <input type="checkbox" name="ativo" id="ativo" value="1" checked>
         <p>
         
         <p>
         <button type="submit">Cadastrar Administrador</button>
         <p>
            <a href="painel_admin.php>Voltar ao painel ddo Administrador"></a>
    </form>
    
</body>
</html>