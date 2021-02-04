

<div class="titulo">Criando banco de dados...</div>
<hr />

<?php
require_once 'conexao.php';

$conexao = novaConexao(null);

$sql = 'CREATE DATABASE IF NOT EXISTS polo_usinagem';

$resultado = $conexao->query($sql);

if($resultado){
    echo "Banco criado com sucesso!";
}else{
    echo "erro: ". $conexao->error;
}

$conexao -> close();

echo '<br /> <br /> <a href="../index.html" ><button > voltar ao inicio</button></a>';

header("location: ../dashboard.php?page=banco_criado_sucesso");

