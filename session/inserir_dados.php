<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserir dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <h1>CADASTRO DE USUÁRIOS</h1>
<?php
require_once 'conexao.php';
if(count($_POST) > 0){
    $erros = [];
    $dados = $_POST;

    if(!isset($dados['usuario'])){
        $erros['usuario'] = "usuario é obrigatorio";
    }
    if(!isset($dados['senha'])){
        $erros['senha'] = "senha é obrigatorio";
    }
    if(!isset($dados['nome'])){
        $erros['nome'] = "nome é obrigatorio";
    }
    if(!isset($dados['email'])){
        $erros['email'] = "email é obrigatorio";
    }
    if(!count($erros)){
        $sql = "INSERT INTO cadastro(usuario, nome, senha, email) VALUES (?, ?,?, ?) ";

        $conexao = novaConexao();
        $stmt = $conexao->prepare($sql);
       
        $params = [
            strtolower($dados['usuario']),
            $dados['nome'],
            $dados['senha'],
            strtolower($dados['email'])
        ];
        $stmt->bind_param("ssss" , ...$params);

        if($stmt->execute()){
            unset($dados);
        }
        
    }

}
?>

<form action="#" method="POST">
    <div class="conteiner table-bordered">
        <div class="form-group ">
            <label for="usuario">Usuário</label>
            <input maxlength="20" id="usuario" type="text" name="usuario" placeholder="digíte um nome de usuário">
        </div>
    
        <div class="form-group ">
            <label for="senha">Senha</label>
            <input maxlength="20"  id="senha" type="password" name="senha" placeholder="digíte uma senha até 20 digítos">
        </div>
    
        <div class="form-group ">
            <label for="nome">Nome e sobrenome</label>
            <input id="nome" type="text" name="nome" placeholder="digíte um nome e sobrenome">
        </div>

        <div class="form-group ">
            <label for="email">E-mail</label>
            <input id="email" type="text" name="email" placeholder="digíte um e-mail válido">
        </div>

        <button class="btn btn-primary btn-lg">CADASTRAR</button>
    </div>
</form>

    </body>
</html>

<style>
    input{
        width: 35%
    }
    .form-group{
        display: flex;
        flex-direction: column;
        align-items: center;

    }
    .conteiner{
        -webkit-box-shadow: 0px 0px 13px -1px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 13px -1px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 13px -1px rgba(0,0,0,0.75);
    }
    H1{
        text-align: center
    }
    .btn.btn-primary.btn-lg, .btn.btn-secondary.btn-lg{
        width: 100%;
    }
</style>