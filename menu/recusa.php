<?php
	if(!isset($_SESSION)){
		session_start();
    }
    date_default_timezone_set('America/Sao_Paulo');

	require_once('../evento/action/conexao.php');
	$database = new Database();
	$db = $database->conectar();

	if (isset($_POST['id_convite'])){
        $status = 0;
        $id_convite = $_POST['id_convite'];
		
        $sql = "UPDATE convites SET status = '$status' WHERE id_convite=$id_convite";
        
        $query = $db->prepare( $sql );
        if ($query == false) {
			print_r($db->errorInfo());
			die ('Erro ao carregar');
		}
		$sth = $query->execute();
        if ($sth == false) {
			print_r($query->errorInfo());
			die ('Erro ao executar');
		}


	}
	header('Location: '.$_SERVER['HTTP_REFERER']);	
?>