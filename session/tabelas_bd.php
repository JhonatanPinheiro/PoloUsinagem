
<div class="titulo">Criando tabelas do banco...</div>
<hr />

<?php

require_once 'conexao.php';

$sql = "CREATE TABLE IF NOT EXISTS cadastro (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(30)NOT NULL,
    email VARCHAR(100) NOT NULL,
    tipo varchar(15)NOT NULL
    )";
   
   $conexao = novaConexao();
   $resultado = $conexao->query($sql);

   
if($resultado){
    echo "Tabela criada com sucesso!";
}else{
    echo "erro: ". $conexao->error;
}

$conexao -> close();

echo '<br /> <br /> <button href="../index.html">voltar ao inicio</button>';
header("location: ../dashboard.php?page=tabela_criado_sucesso");