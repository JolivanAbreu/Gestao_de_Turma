<?php
$conn = mysqli_connect("localhost", "root", "", "aps");
$sql = "SELECT a.id,a.descricao,t.nome_turma,t.id AS id_turma
 FROM atividades a
 INNER JOIN turmas t
 ON t.id = a.id_turma";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

?>

