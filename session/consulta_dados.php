<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de  dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<?php

require_once 'conexao.php';



$sql = "SELECT id, usuario, nome, email FROM cadastro";

$conexao = novaConexao();
if(!isset($_GET['excluir']) || $_GET['excluir']){
    $excluirSQL = 'DELETE FROM cadastro WHERE id = ?';
    $stmt = $conexao->prepare($excluirSQL);
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

$resultado = $conexao->query($sql);

$registros = [];

if($resultado->num_rows > 0 ){
    while($row = $resultado->fetch_assoc()){
        $registros[] = $row;
    }
}else if($conexao->error){
    echo 'Falha'. $conexao->error;
}

$conexao->close();
?>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <th>ID</th>
        <th>Usuario</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Excluir</th>
    </thead>
    <tbody>
        <?php foreach($registros as $registro):?>
            <tr>
                <td> <?= $registro['id']?>  </td>
                <td> <?= $registro['usuario']?> </td>
                <td> <?= $registro['nome']?> </td>
                <td> <?= $registro['email']?> </td>
                <td> <a href="Consulta_dados.php?excluir=<?= $registro['id']?>" 
                        class="btn btn-danger">Excluir</a> 
                </td>
            </tr>
            <?php endforeach ?>
    </tbody>
</table>
<style>
    table > *{
        font-size: 1.2rem;
    }
    .btn.btn-secondary{
        width: 100%;;
    }
</style>