<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SGE - Atualização de Atividades</title>
    <link rel="stylesheet" href="css/atualizarAtv.css">
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
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="atividades.php">Sair</a>
                </button>
            </div>
        </div>
    </header>
    <main id="principal">
        <form method="post" action="php/atualizarAtividades.php" id="formAtualizarAtividades">
            <?php
            // Verifique se o ID da atividade foi passado via GET
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                // Adicione um campo de entrada oculto para o ID
                echo '<input type="hidden" id="id" value="' . $id . '" name="id" />';
            } else {
                echo '<input type="hidden" id="id" name="id" />';
            }
            ?>
            <div id="text">
                <legend>Atualização de Atividades</legend>
                <label for="descricao">Descrição:</label><br>
                <textarea rows="5" cols="45" name="descricao" id="descricao"></textarea><br><br>
            </div>
            <input type="submit" value="Atualizar" id="enviar" /><br>
        </form>
    </main>
    <script src="js/atividades.js"></script>
</body>

</html>