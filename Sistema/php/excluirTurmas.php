<?php
$conn = mysqli_connect("localhost", "root", "", "aps");
$id = trim($_GET["id"]);

echo $sql1 = "SELECT * FROM atividades WHERE id_turma = $id";
$result = $conn->query($sql1);

if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("Turma não pode ser excluida!!"); window.location.href = "../turmas1.php"</script>';
} else {
    $sql = "DELETE FROM turmas WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script>alert("Turma excluida com sucesso!!"); window.location.href = "../turmas1.php"</script>';
    } else {
        echo '<script>alert("Erro ao excluir a turma!!"); window.location.href = "../turmas1.php"</script>';
    }
}
