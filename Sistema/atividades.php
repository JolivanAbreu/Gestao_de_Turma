<?php
$id = trim($_GET['id']);
?>
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
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="turmas1.php">Sair</a>
                </button>
            </div>
        </div>
    </header>

    <main id="principal">
        <?php
        echo "<a href='http://localhost/teste/cadastrarAtv1.php?id=" . $id . "'>
            <button type='button' id='cadastrarTurma'>
                Cadastrar atividades
            </button>
        </a>";    
        ?>
        <h4 id="turma"></h4>
        <div id="resultado"></div>
    </main>

    <script src="js/actives.js"></script>
</body>

</html>