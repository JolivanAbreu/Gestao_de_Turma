<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SGE</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <header id="cabeçalho">
        <h1>SGE - Sistema de Gestão Escolar</h1>
    </header>
    <form method="post" action="php/login.php" id="formlogin" name="formlog">
        <div class="acesso">
            <div class="dentro">
                <label for="email">Email</label>
                <input type="text" name="email">
                <label for="email"><abbr title="required"></abbr></label>
                <label for="senha">Senha</label>
                <input type="text" name="senha">
                <label for="senha"><abbr title="required"></abbr></label>
                <input type="submit" class="button" value="Entrar" /><br>
            </div>
        </div>
    </form>
</body>

</html>