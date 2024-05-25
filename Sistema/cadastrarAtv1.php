<?php
$id = ($_GET['id']); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SGE</title>
    <link rel="stylesheet" href="css/cadastrarAtv.css">
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
        <form method="post" action="php/cadastrarAtividades.php" id="formturma">
            <input type="hidden" id="id" value="<?php echo $id; ?>" name="id" />
            <div id="text">
                <legend>Cadastro de Atividades</legend>
                <label>Descrição: </label><br>
            </div>
            <textarea rows="5" cols="45" name="descricao" id=" descricao">
                </textarea><br><br>
            <input type="submit" value="Cadastrar" id="enviar" /><br>

        </form>
    </main>
    <script src="js/atividades.js"></script>
</body>

</html>