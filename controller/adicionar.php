<?php
// Inclui o arquivo de conexão com o banco de dados
require_once('conexao.php');

// Verifica se foi enviado um formulário com a URL a ser adicionada
if(isset($_POST['url'])){
    // Recupera a URL digitada pelo usuário
    $url = $_POST['url'];
		if (strpos($url, 'http://') !== 0 && strpos($url, 'https://') !== 0) {
    	header('Location: ../index.php?erro=1');
	}
	$nota = $_POST['nota'];
	$data = $_POST['data'];
	$ip = $_POST['ip'];

    // Cria uma consulta SQL para inserir a URL no banco de dados
    $sql = "INSERT INTO urls (url, nota, data_criacao, ip) VALUES ('$url', '$nota', '$data', '$ip')";

    // Executa a consulta SQL
    if(mysqli_query($conn, $sql)){

    	// Verifica se a checkbox foi marcada
	    if(isset($_POST['redirect']) && $_POST['redirect'] == 1) {
	        // Redireciona o usuário para a URL informada
	        header("Location: $url");
	        exit();
	    }else
        // Redireciona o usuário para a página da URL adicionada
        header("Location:../index.php");
        exit();
    } else {
        // Caso ocorra algum erro na inserção, exibe uma mensagem de erro
        header('Location: ../index.php?erro=3');
        // echo mysqli_error($conexao);
    }
}
?>
