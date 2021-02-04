
<?php


function novaConexao($banco = 'polo_usinagem'){
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error){
        echo ('Erro de conexao: '. $conexao->connect_error);
        exit();
    }
    return $conexao;

};