<?php
if(isset($_GET['erro'])){
    if($_GET['erro'] == 1){
        $erro = "Você precisa colocar HTTP:// ou HTTPS:// no final!";
    }else if($_GET['erro'] == 2){
        $erro = "aaaaaaaaaaaaaaaaaa";

    }else if($_GET['erro'] == 3){
        $erro = "Ocorreu um erro inesperado em nosso sistema. Tente novamente mais tarde ou contate o administrador.";
    }
}else{
    $erro = "";
}

$data = date('d/m/Y H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

    require_once('controller/conexao.php');

    $sql = "SELECT * FROM urls ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $av = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adicionar URL</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <div class="left-col">

    <form id="form" method="post" action="controller/adicionar.php" accept="url">
        <label for="url">Digite a URL:</label>
        <input type="text" id="url" name="url" placeholder="URL com HTTPS:// ou HTTP://" required>
        <input type="number" id="nota" name="nota" placeholder="Nota de 0 a 10" min="0" max="10" step="0.1" required>
        <input type="hidden" name="ip" value="<?=$ip?>">
        <input type="hidden" name="data" value="<?=$data?>">
        <label for="check_redirect">
            <input type="checkbox" id="check_redirect" name="redirect" value="1"> Redirecionar para a URL
        </label>
        <button type="submit" id="submit">Adicionar</button>
    </form>
    </div>

    <table id="exemplo" class="display">
        <thead>
            <tr>
                <th>URL</th>
                <th>Nota</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $av){ ?>
            <tr>
                <td><a href="<?=$av['url']?>" target="_blank"><?=$av['url']?></a></td>
                <td><?=$av['nota']?></td>
                <td><?=$av['data_criacao']?></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<footer>
  <p>Copyright 2023 &copy; Ryan Marcos Stanga de Lara</p>
  <ul>
    <li><a href="github.com/flownayr" target="_blank">GitHub</a></li>
    <li><a href="https://whishosting.com.br/" target="_blank">WhisHosting</a></li>
    <li><a href="mailto:ryan.stanga.lara@gmail.com">ryan.stanga.lara@gmail.com</a></li>
  </ul>
</footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#exemplo').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>

    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script>
      function validarNota() {
        var nota = document.getElementById("nota").value;
        if (nota < 0 || nota > 10) {
          alert("A nota deve ser entre 0 e 10.");
          return false;
        }
        return true;
      }
    </script>
</body>
</html>
