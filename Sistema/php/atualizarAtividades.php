<?php
// Conexão com o banco de dados (substitua pelos seus dados)
$conn = mysqli_connect("localhost", "root", "", "aps");

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o ID e a descrição da atividade foram recebidos
    if(isset($_POST["id"]) && isset($_POST["descricao"])) {
        $id = trim($_POST["id"]);
        $descricao = trim($_POST["descricao"]);

        // Verificar se o ID é um número válido
        if (!is_numeric($id)) {
            echo '<script>alert("ID da atividade inválido.");</script>';
            exit; // Sair do script se o ID for inválido
        }

        // Verificar se a descrição não está vazia
        if (empty($descricao)) {
            echo '<script>alert("A descrição da atividade não pode estar vazia.");</script>';
            exit; // Sair do script se a descrição estiver vazia
        }

        // Verificar se a atividade com o ID fornecido existe no banco de dados
        $check_query = "SELECT id FROM atividades WHERE id = $id";
        $result = mysqli_query($conn, $check_query);
        if(mysqli_num_rows($result) == 0) {
            echo '<script>alert("ID da atividade não encontrado.");</script>';
            exit; // Sair do script se o ID da atividade não for encontrado
        }

        // Preparar a consulta SQL para atualizar a descrição da atividade
        $sql = "UPDATE atividades SET descricao = ? WHERE id = ?";

        // Preparar a declaração
        $stmt = $conn->prepare($sql);

        // Vincular parâmetros
        $stmt->bind_param("si", $descricao, $id);

        // Executar a declaração
        if ($stmt->execute()) {
            // Se a atualização for bem-sucedida, exibir um alerta de sucesso e redirecionar para atividades.php
            echo '<script>alert("Descrição da atividade atualizada com sucesso!"); window.location.href = "../atividades.php"</script>';
        } else {
            // Se houver um erro, exibir um alerta de erro com detalhes        
            echo '<script>alert("Erro ao atualizar a descrição da atividade: ' . $conn->error . '");</script>';
        }

        // Fechar a declaração
        $stmt->close();
    } else {
        // Se o ID ou a descrição da atividade não foram recebidos, exibir um alerta de erro
        echo '<script>alert("ID da atividade ou descrição não fornecidos.");</script>';
    }
} else {
    // Se o formulário não foi submetido, exibir um alerta de erro
    echo '<script>alert("O formulário não foi submetido.");</script>';
}
?>
