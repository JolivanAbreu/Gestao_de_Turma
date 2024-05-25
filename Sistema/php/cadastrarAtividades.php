<?php
 $conn = mysqli_connect("localhost", "root", "", "aps");
 $id = $_POST["id"];
 $descricao = trim($_POST["descricao"]);
 
 $sql = "INSERT INTO atividades 
 (descricao, id_turma) 
 VALUES 
 ('$descricao', $id)";
 $result = $conn -> query($sql);
 if($result){
 echo '<script>alert("Atvidade cadastrada com sucesso!!"); window.location.href = 
"../atividades.php"</script>';
 }else{
 echo "ERRO";
 }
 
?>