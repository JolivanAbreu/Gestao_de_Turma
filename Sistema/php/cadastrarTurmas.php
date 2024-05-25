<?php
session_start();
 $conn = mysqli_connect("localhost", "root", "", "aps");
 $nome_turma = trim($_POST['nome_turma']);
 $id_professor = $_SESSION['id'];
 $sql = "INSERT INTO turmas 
 (nome_turma, id_professor) 
 VALUES 
 ('$nome_turma', $id_professor)";
 $result = $conn -> query($sql);
 if($result){
 echo '<script>alert("Turma cadastrada com sucesso!!"); window.location.href = 
"../turmas1.php"</script>';
 }else{
 echo '<script>alert("ERROR"); window.location.href = "../cadastrarTurmas.php"</script>';
 }
 
?>