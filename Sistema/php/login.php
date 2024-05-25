<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$email = $_POST['email'];
$senha = $_POST['senha'];
//conexão
$conn = mysqli_connect("localhost", "root", "", "aps");
//consulta para verificar se o email e a senha conferem
$sql = "SELECT * FROM professor
WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows ($result) > 0 ){
$row = mysqli_fetch_array($result);
$_SESSION['nome_professor'] = $row['nome_professor'];
$_SESSION['id'] = $row['id'];
header('location:../turmas1.php');
}else{
unset ($_SESSION['email']);
unset ($_SESSION['senha']);
header('location:../index.html');
// removendo todas as sessões
session_start();
session_destroy();
unset( $_SESSION );
}
?>
