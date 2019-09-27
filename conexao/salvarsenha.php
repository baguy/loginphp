<?php
session_start();
include('conexao.php');

if(empty($_POST['codigo'])) {
	header('Location: ../redefinirsenha.php');
	exit();
}

$codigo = mysqli_real_escape_string($conexao, $_POST['codigo']);

$query = "select usuario from usuario where senha = md5('{$codigo}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {

  $senha1 = mysqli_real_escape_string($conexao, $_POST['senha1']);
  $senha2 = mysqli_real_escape_string($conexao, $_POST['senha2']);

  if($senha1 == $senha2) {

    $sql = "update usuario set senha = md5('{$senha1} where senha = md5('{$codigo}')";

		if($conexao->query($sql) === TRUE){

			$conexao->close();

			header('Location: ../index.php');
			exit();

		} else {
			$_SESSION['errosenha'] = true;
			header('Location: ../redefinirsenha.php');
			exit();

		}

  } else {

    $_SESSION['errosenha'] = true;
    header('Location: ../redefinirsenha.php');
    exit();

  }

} else {

	$_SESSION['errocodigo'] = true;
	header('Location: ../redefinirsenha.php');
	exit();

}
