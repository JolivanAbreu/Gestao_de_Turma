<?php
$conn = mysqli_connect("localhost", "root", "", "aps");

// Verificar se o ID da atividade foi enviado via POST
if(isset($_POST["id"])) {
    $id = trim($_POST["id"]);

    // Preparar a consulta SQL para excluir a atividade
    $sql = "DELETE FROM atividades WHERE id = $id";

    // Executar a consulta
    if (mysqli_query($conn, $sql)) {
        // Se a exclusão for bem-sucedida, retornar uma mensagem de sucesso
        echo json_encode(array("message" => "Atividade excluída com sucesso!"));
    } else {
        // Se houver um erro, retornar uma mensagem de erro com detalhes
        echo json_encode(array("message" => "Erro ao excluir a atividade: " . mysqli_error($conn)));
    }
} else {
    // Se o ID da atividade não foi enviado, retornar uma mensagem de erro
    echo json_encode(array("message" => "ID da atividade não fornecido."));
}
?>
