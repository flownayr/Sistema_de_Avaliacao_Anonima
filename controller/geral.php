<?
require_once('conexao.php');

$data = date('d/m/Y H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

    $sql = "SELECT * FROM urls ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $av = mysqli_fetch_array($result);
?>