<?php
    if(!isset($_SESSION)){
        session_start();
    }

    $id_user = $_SESSION['idUsuario'];

    require_once('./evento/action/conexao.php');

    date_default_timezone_set('America/Sao_Paulo');
    $database = new Database();
    $db = $database->conectar();

    $numNotificacao=0;

    $sql = "SELECT * FROM convites as c
    LEFT JOIN usuarios as u ON c.fk_id_remetente = u.id_usuario
    LEFT JOIN eventos as e ON c.fk_id_evento = e.id_evento
    WHERE fk_id_destinatario=$id_user AND status IS null";
    $req = $db->prepare($sql);
    $req->execute();
    $numNotificacao = $req->rowCount();
?>


<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-fw"></i><span class="badge badge-danger"><?php echo "$numNotificacao"; ?> </span> <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu" style="width:280px">
        <?php
            while ($dados = $req->fetch(PDO::FETCH_ASSOC)) {
                $id_convite = $dados['id_convite'];
                $nome_usuario = $dados['nome'];
                $id_usuario2 = $dados['id_usuario'];
                $nome_evento = $dados['titulo'];
                $descricao_evento = $dados['descricao'];
                $data_inicio = $dados['inicio'];
                $data_termino = $dados['termino'];
                $cor_evento = $dados['cor'];

                $data_inicio = date('d/m/Y H:i:s', strtotime($data_inicio));
                echo "
                <div class=\"alert alert-info\" role=\"alert\">
                <form class=\"form-horizontal\" method=\"POST\" action=\"menu/aceita.php\">
                
                        <i class=\"fa fa-bell fa-fw\"></i> 
                        $nome_usuario, esta te convidando para o evento $nome_evento no
                        dia $data_inicio, o que acha?
                        <br>
                        <input type=\"hidden\" name=\"id_convite\" class=\"form-control\" id=\"id_convite\" value=\"$id_convite\">
                        <input type=\"hidden\" name=\"id_usuario2\" class=\"form-control\" id=\"id_usuario2\" value=\"$id_usuario2\">
                        <input type=\"hidden\" name=\"titulo\" class=\"form-control\" id=\"titulo\" value=\"$nome_evento\">
                        <input type=\"hidden\" name=\"descricao\" class=\"form-control\" id=\"descricao\" value=\"$descricao_evento\">
                        <input type=\"hidden\" name=\"inicio\" class=\"form-control\" id=\"inicio\" value=\"$data_inicio\">
                        <input type=\"hidden\" name=\"termino\" class=\"form-control\" id=\"termino\" value=\"$data_termino\">
                        <input type=\"hidden\" name=\"cor\" class=\"form-control\" id=\"cor\" value=\"$cor_evento\">
                        <button type=\"submit\" class=\"btn btn-primary\">Aceitar</button>
                        </form>
                        <form class=\"form-vertical\" method=\"POST\" action=\"menu/recusa.php\">
                        <div class=\"buttonAlign\">
                        <input type=\"hidden\" name=\"id_convite\" class=\"form-control\" id=\"id_convite\" value=\"$id_convite\">
                        <button type=\"submit\" class=\"btn btn-danger\">Recusar</button>
                        </div>
                        </form>
                </div>";
            }
        ?>
    </ul>
</li>