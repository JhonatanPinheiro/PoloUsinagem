<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro_produto.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserir produtos</title>
</head>

<body>
    <h1>Inserindo produtos do torneamento</h1>



<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro" >
    <div class="indent-cadastro">
        <div class="conteiner ">
            <div class="form-group ">
                <br />
                <label for="titulo" class="bold">Título para produto a ser postado</label>
                <input maxlength="20" id="titulo" type="text" name="titulo" placeholder="digíte um nome do título">
            </div>
        
            <div class="form-group ">
                <label for="descricao" class="bold">Descrição do produto</label>
                <textarea maxlength="200"  id="descricao" type="text" rows="4" cols="50"" name="descricao" placeholder="digíte uma descrição para o produto"></textarea>
            </div>
        
            <div class="form-group ">
                <input value="Procurar" type="file" name="foto" />
            </div>
            <br />
            <br />

            <input type="submit" name="cadastrar" value="CADASTRAR" class="btn btn-primary btn-lg">
            <hr />
        </div>
    </div>
</form>




<?php
require_once 'conexao.php';

$conexao = novaConexao();

if(isset($_POST['cadastrar'])){
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $foto = $_FILES["foto"];


    if(!empty($foto['name'])){
        $largura = 1080;
        $altura = 1080;
        $tamanho = 500000;

        $error = array();

        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
            $error[1] = "isso não é uma imagem.";
        }
        $dimensoes = getimagesize($foto["tmp_name"]);

        if($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
        }
         if($foto["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
        }
        
        if (count($error) == 0) {
        
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../imagens/produtos/" . $nome_imagem;
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
            // Insere os dados no banco
            $sql = "INSERT INTO produtos_t2(titulo, descricao, imagem, datap) VALUES ('$titulo', '$descricao', '$nome_imagem', NOW())";

     
        
            // Se os dados forem inseridos com sucesso
            if ($sql){
                echo "<script> alert('Upload realizado com sucesso')</script>";
            }
        }
         // Se houver mensagens de erro, exibe-as
         if (count($error) != 0) {
            foreach ($error as $erro) {
                echo "<script> alert('$erro')</script>";
            }
        }
               $resultado = $conexao->query($sql);

            if($conexao->error){
                echo 'Falha'. $conexao->error;
            }
            $conexao->close();
    }
}
?>


    
</body>
</html>

