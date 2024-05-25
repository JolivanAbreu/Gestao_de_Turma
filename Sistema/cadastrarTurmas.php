<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SGE</title>
    <link rel="stylesheet" href="./css/casdastraTurmas.css">
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
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="turmas1.php">Sair</a>
                </button>
            </div>5
        </div>
    </header>
    <main id="principal">
        <form method="post" action="php/cadastrarTurmas.php" id="formturma">
                <div id="text">
                <legend>Cadastro de turmas</legend>
                </div>                
                <label>Nome: </label><br>
                <input type="text" name="nome_turma" id="nome_turma" /><br><br>
                <input type="submit" value="Cadastrar" /><br>
        </form>
    </main>
</body>

</html>