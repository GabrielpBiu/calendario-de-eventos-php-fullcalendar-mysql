<?php
	require_once('conexao.php');
	$database = new Database();
	$db = $database->conectar();

	if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
		
		
		$id_evento = $_POST['Event'][0];
		$inicio = $_POST['Event'][1];
		$termino = $_POST['Event'][2];

		$inicio= date('Y/m/d H:i:s', strtotime($inicio));
		$termino= date('Y/m/d H:i:s', strtotime($termino));

		$sql = "UPDATE eventos SET  inicio = '$inicio', termino = '$termino' WHERE id_evento = $id_evento ";

		
		$query = $db->prepare( $sql );
		if ($query == false) {
			print_r($db->errorInfo());
			die ('Erro ao carregar');
		}

		$sth = $query->execute();
		if ($sth == false) {
			print_r($query->errorInfo());
			die ('Erro ao executar');
		}else{
			die ('OK');
		}

	}
	//header('Location: '.$_SERVER['HTTP_REFERER']);
?>
