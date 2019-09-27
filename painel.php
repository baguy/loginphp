<?php
// session_start();
include('conexao/verifica_login.php');
?>

<h2>Olá, <?php echo $_SESSION['usuario'];?></h2>
<h2><a href="conexao/logout.php">Sair</a></h2>
