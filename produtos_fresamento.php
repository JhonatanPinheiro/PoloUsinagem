<!DOCTYPE html>
  <?php 
    require_once "cabecalho.html";
    require_once 'session/conexao.php';
    require_once "header.html"; 
   ?>

<body >



    <link rel="stylesheet" href="css/produtos.css">

  <?php 

  $conexao = novaConexao();

  $sql = "SELECT id, titulo, descricao, imagem, datap FROM produtos_t1"; 


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
  <!-- encerra conexao -->
      <div class="indent-produtos">
        <div class="container miniaturas">
          <div class="row">
              <?php foreach($produtos as $produto):?>
              <div class=" col-md-3" >
                  <img class="img-thumbnail" src="imagens/produtos/<?= $produto['imagem'];?>" alt="<?= $produto['titulo']?>">
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
                        ?></small>
                  </div>
              </div>
              <?php endforeach ?>
          </div>
        </div>
      </div>

    

</body>

  <?php require_once "footer.html"?>

</html>

