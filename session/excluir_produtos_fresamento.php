<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de  dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/produtos.css">
</head>

<?php

require_once 'conexao.php';



$sql = "SELECT id, titulo, descricao, imagem, datap FROM produtos_t1"; 

$conexao = novaConexao();
if(!isset($_GET['excluir']) || $_GET['excluir']){
    $excluirSQL = 'DELETE FROM produtos_t1 WHERE id = ?';
    $stmt = $conexao->prepare($excluirSQL);
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

$resultado = $conexao->query($sql);

$produtos = [];

if($resultado->num_rows > 0 ){
    while($row = $resultado->fetch_assoc()){
        $produtos[] = $row;
    }
}else if($conexao->error){
    echo 'Falha'. $conexao->error;
}

$conexao->close();
?>

<div class="indent-produtos">
        <div class="container miniaturas">
          <div class="row">
              <?php foreach($produtos as $produto):?>
               
              <div class="col-md-3" >
                  <div class="card-header">
                      <small class="btn btn-danger"><a href="excluir_produtos_fresamento.php?excluir=<?= $produto['id']?>" 
                        class="btn btn-danger">Excluir</a> </small>
                  </div>
                  <img class="img-thumbnail" src="../imagens/produtos/<?= $produto['imagem'];?>" alt="<?= $produto['titulo']?>">
                  <div class="card-body fer">
                      <h5 class="card-title"><?= $produto['titulo']?></h5>
                      <p class="card-text"><?= $produto['descricao']?></p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">
                        <?php 
                            $datap = $produto['datap'];
                            $date = new DateTime("$datap");
                            echo "Última atualização em ".$date->format("d/m/Y  H:i ");
                        ?>
                        
                    </small>
                  </div>
              </div>
              <?php endforeach ?>
          </div>
        </div>

    