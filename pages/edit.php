<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "escola";
$dbname = "Lukscar";
// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para editar um usuário
function editarUsuario($usuario_id, $novo_nome, $novo_email, $novo_tipo) {
    global $conn;
    
    $sql = "UPDATE usuarios SET nome = ?, email = ?, tipo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $novo_nome, $novo_email, $novo_tipo, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Usuário atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar usuário: " . $stmt->error;
    }
    
    $stmt->close();
}

// Exemplo de uso
$usuario_id = 1; // ID do usuário a ser atualizado
$novo_nome = "Novo Nome";
$novo_email = "novoemail@example.com";
$novo_tipo = "usuario_comum";

editarUsuario($usuario_id, $novo_nome, $novo_email, $novo_tipo);

// Fechando a conexão
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luks Car Store - Home</title>
    <link rel="stylesheet" href="s.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="navegation-container"> 
            <div class="nav-left-container">
                <a href="index.php" id="logo-title"> Luks Car </a>
            </div>
            <div class="nav-mid-container">
                <ul class="item-list">
                    <li id="item-list-number1"><a href="review.php">Avaliações</a></li>
                    <li id="ite-list-number2"><a href="join.php">Entrar</a></li>
                </ul>
            </div>
            <div class="nav-right-container">
                <a href="register.php">REGISTRE-SE</a>
            </div>
        </div>
    </nav>
    <main>
        <div class="index-image-container">
            <img src="mercedes-car.png" width="420px" height="220px">
        </div>
        <div class="index-text-container"> 
            <h1>administrador</h1>
            <div class="index-sub-text-container">
                <h2>Altere a conta</h2>
            </div>
        </div>
    </main>
    <form>
    <section class="login-section">
        <div class="login-container">
            <h2>Entrar na Sua Conta</h2>
            <form action="join.php" method="post">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha"><br><br>
                <select id="tipo" name="tipo" required>
                 <option value="" disabled selected>Selecione o tipo</option>
                 <option value="0">0</option>
                 <option value="1">1</option>
        </select>

    <button type="submit">Atualizar</button>
    <button type="button" onclick="window.location.href='join.php'"> Login</button>
            </form>
        </div>
    </section>
</body>
</html>