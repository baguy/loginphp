<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Segurança da Informação</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Login — Atividade 3</h3>
                    <?php
                    if(isset($_SESSION['errosenha'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Senhas não batem.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['errosenha']);

                    if(isset($_SESSION['errocodigo'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Código não verificado.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['errocodigo']);
                    ?>
                    <div class="box">

                        <form action="conexao/salvarsenha.php" method="POST">

                            <div class="field">
                                <div class="control">
                                  <label>Inserir código recebido por email</label>
                                    <input name="codigo" name="text" class="input is-large" placeholder="Código recebido por email" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                  <label>Inserir nova senha</label>
                                    <input name="senha1" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                  <label>Repetir nova senha</label>
                                    <input name="senha2" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>

                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Salvar</button>

                        </form>

                        <a href='http://localhost/loginphp/login.php'>Login</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
