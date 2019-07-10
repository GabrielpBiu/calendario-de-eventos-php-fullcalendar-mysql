<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include ('evento/action/conexao.php');
    $database = new Database();
    $db = $database->conectar();
    
    if (isset($_POST) &&(!empty($_POST))){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $sql = "SELECT *
                FROM usuarios
                WHERE nome = '$usuario' AND senha = sha1('$senha')";
        $req = $db->prepare($sql);
        $req->execute();
        $linhas = $req->rowCount();
        if ($linhas == 1) {
            while ($dados = $req->fetch(PDO::FETCH_ASSOC)) {
                $id_usuario = $dados['id_usuario'];
                $nome_usuario = $dados['nome'];
                $_SESSION['idUsuario'] = $id_usuario;
                $_SESSION['nomeUsuario'] = $nome_usuario;
            }
                header('Location: index.php');
        }else {
            //Mensagem de erro no Login
            header('Location: login.php?erro=1');
        }
    }
?>

<script src="js/jquery.js"></script>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Calendario">

    <title>Calendario</title>

    <!-- Chamando folhas de estilos CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="fundoLogin">
<div class="container">


    <div class="row">
	
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading2">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">

                    <!-- Exibir mensagem de erro no login -->
                    <?php
                    if(isset($_GET['erro']) && $_GET['erro']==1) {
                        echo "<div style='text-align: center' class=\"alert alert-danger\" role=\"alert\">
                        <b>Usuario ou senha Incorretos!</b>
                      </div>";
                    }
                    ?>

                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Usuario" name="usuario" type="username" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Senha" name="senha" type="password" required>
                            </div>
                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    
	</div>
</div>
</div>

</body>

</html>