<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form-container">
        <h2>Cadastro</h2>

        <form method= "POST">

            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome"
                placeholder="Digite seu nome" required>
            </div>

            <div class="campo">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" 
                placeholder="Digite seu e-mail" required>
            </div>

            <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone"
                 placeholder="Digite seu telefone" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    // Obtém a conexão configurada na Render
    $databaseUrl = getenv("DATABASE_URL");

    // Conecta ao PostgreSQL
    $conexao = pg_connect($databaseUrl);

    // Salva o e-mail no banco
    pg_query_params(
        $conexao,
        "INSERT INTO usuarios (email) VALUES ($1)",
        array($email)
    );

    // Mostra a confirmação
    echo "Cadastro realizado com sucesso!";

}

?>

</body>
</html>
