<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="imgs/icons8-cadastro-50.png">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastramento</title>
</head>
<body>

    <?php

        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbname = "cadastramento";

        //Criar a conexão

        $conn = new mysqli($serverName, $userName, $password, $dbname );

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuariois (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

            if ($conn->query($sql) === TRUE) {
                echo "Novo registro criado com sucesso";
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();

    ?>

    <header> 
        <h1>Registrar Usuário</h1>        
    </header>

    <form action="" method="post">

        <div class="container">
            Nome: <input type="text" name="nome" id="" required autocomplete="off" class="inpText"> <br><br>
            Email: <input type="email" name="email" id="" required autocomplete="off" class="inpText"> <br><br>
            Senha: <input type="password" name="senha" id="" required class="inpText"> <br><br>

            <input type="submit" value="Cadastrar" class="submit">
        </div>
    </form>

    <footer>
        <p>Feito por Israel Salvalaio Nunes | 06/06/2024 &copy; &reg;</p>
    </footer>
    
</body>
</html>