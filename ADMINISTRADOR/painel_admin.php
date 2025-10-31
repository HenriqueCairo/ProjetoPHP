<?php
session_start(); //Iniciar a sessão

if(!isset($_SESSION['admin_logado'])){  //se nao esta definida a sessao $_SESSION nao foi criado (por conta de algum erro no login) 
    header('Location:longin.php'); // vai encaminhar novamente para a pagina de login 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Adiministrador</title>
</head>
<body>
    <h2>Bem-Vindo, Administrador</h2>
    <a href="cadastrar_administrador.php">
       <button>Cadastrar Administrador</button>
    </a>
    <a href="listar_administrador.php">
       <button>Listar Adiministradores</button>
    </a>
    <a href="cadastrar_produtos.php">
       <button>Listar Adiministradores</button>
    </a>
    <a href="listar_produtos.php">
       <button>Listar Adiministradores</button>
    </a>
</body>
</html>