
<?php 
require_once 'session/conexao.php';
$conexao = novaConexao();

$sql = "SELECT id, titulo, descricao, imagem FROM carrossel"; 


$resultado = $conexao->query($sql);

$carrossel = [];

if($resultado->num_rows > 0 ){
    while($row = $resultado->fetch_assoc()){
        $carrossel[] = $row;
    }
}else if($conexao->error){
    echo 'Falha'. $conexao->error;
}
$conexao->close();
?>


<div class="indent">
  <div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
      <?php foreach($carrossel as $car):?>
        <li data-target="#carouselExampleCaptions" data-slide-to="<?=$car['id']?>" class="<?php if($car['id']=='1') echo 'active';?>"></li>
        <?php endforeach?>
        <!-- <li data-target="#carouselExampleCaptions" data-slide-to="2"></li> -->
      </ol>
      <div class="carousel-inner">
      <?php foreach($carrossel as $car):?>
        <div class="carousel-item <?php if($car['id']=='1') echo 'active';?>">
          <img src="imagens/carrossel/<?= $car['imagem'];?>" id="imagem_carousel" class="d-block w-100 " alt="imagens de car$cars destacados">
            <div class="carousel-caption d-none d-md-block">
              <h5><?= $car['titulo']?></h5>
              <p><?= $car['descricao']?></p>
            </div>
        </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
      <?php endforeach ?>
      </div>

    </div> 
  </div>
</div>