<?php

session_start();

require_once('conexao.php');

if (!isset($_SESSION['admin_logado'])) {
    header("Location:login.php");
    exit();
}
$administradores = []; // Inicializa como array vazio

try {
    //Usando declarações preparadas (recomendado):
    $stmt = $pdo->prepare("SELECT * FROM ADMINISTRADOR"); //vai buscar todas as colunas da tabela ADMINISTRADOR
    $stmt->execute(); 
    $administradores = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch = recuperar, buscar

} catch (PDOException $e) {
    echo "<p style='color:red;'>Erro ao listar administradores: " . $e->getMessage() . "</p>";
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Listar Administradores</title>


<script>
function confirmDeletion() {
    return confirm('Tem certeza que deseja deletar este administrador?'); 
}
</script>

</head>
<body>
<h2>Administradores Cadastrados</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Ativo</th>
        <th>Ações</th>
        <!-- <th>Imagem</th> -->
    </tr>
    <?php foreach($administradores as $adm): ?>
    <tr>
        <td><?php echo $adm['ADM_ID']; ?></td>
        <td><?php echo $adm['ADM_NOME']; ?></td>
        <td><?php echo $adm['ADM_EMAIL']; ?></td>
        <td><?php echo $adm['ADM_SENHA']; ?></td>
        <td><?php echo ($adm['ADM_ATIVO'] == 1 ? 'Sim' : 'Não'); ?></td>
        
        <td>
            <a href="editar_administrador.php?id=<?php echo $adm['ADM_ID']; ?>" class="action-btn">Editar</a>
            

            <a href="excluir_administrador.php?id=<?php echo $adm['ADM_ID']; ?>" class="action-btn delete-btn" onclick="return confirmDeletion();">Excluir</a>
            
        </td>
</tr>
    <?php endforeach; ?>
</table>
    <p></p>
    <a href="painel_admin.php">Voltar ao Painel do Administrador</a>
</body>
</html>
