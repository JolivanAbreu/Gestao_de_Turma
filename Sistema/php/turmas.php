<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "aps");
$id_professor = $_SESSION['id'];
$sql = "SELECT t.id,t.nome_turma FROM turmas t
 WHERE t.id_professor = $id_professor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
