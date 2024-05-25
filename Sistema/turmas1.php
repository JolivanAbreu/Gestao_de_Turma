<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SGE</title>
    <link rel="stylesheet" href="./css/turmas.css">
</head>

<body>
    <header id="cabeçalho">
        <div id="cab">
            <h1>SGE - Sistema de Gestão Escolar</h1>
            <div class="Move">
                <div id="usuario">
                    <p href="login.php">
                    <p id="name">
                    <h2><?php
                        session_start();
                        echo $_SESSION['nome_professor']
                        ?></h2>
                    </p>
                    </p>
                </div>
            </div>
            <div id="sair">
                <button id="button_cabeçalho">
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="index.php">Sair</a>
                </button>
            </div>5
        </div>
    </header>
    <br>
    <br>
    <main id="principal">
        <button type="button" id="cadastrarTurma">
            <a href="cadastrarTurmas.php" id="tabela">Cadastrar turmas</a>
        </button>
        <h4>Turmas</h4>
        <div id="resultado"></div>
    </main>
    <script src="js/turma.js"></script>
</body>

</html>