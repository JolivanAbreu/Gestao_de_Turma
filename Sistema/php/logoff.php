<?php
 session_start();
 unset ($_SESSION['email']);
 unset ($_SESSION['senha']);
 unset ($_SESSION['nome_professor']);
 unset ($_SESSION['id']);
 session_destroy();
 header('location:../index.html');
 exit();
?>