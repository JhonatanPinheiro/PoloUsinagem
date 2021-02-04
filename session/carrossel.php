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
    <h1>Inserindo imagens no carrossel</h1>



<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro" >
    <div class="indent-cadastro">
        <div class="conteiner ">
            <div class="form-group ">
                <br />
                <label for="titulo" class="bold">Título para o carrossel</label>
                <input id="titulo" type="text" name="titulo" placeholder="digíte um nome do título">
            </div>
            <div class="form-group ">
                <label for="ordem">ordem do carrossel</label>
                <select name="ordem" id="ordem" value="Ordem do carrossel">
                    <option id='1' value="1">1</option>
                    <option id='2' value="2">2</option>
                    <option id='3' value="3">3</option>
                </select>
            </div>
        
            <div class="form-group ">
                <label for="descricao" class="bold">Descrição do carrossel</label>
                <textarea id="descricao" type="text" rows="4" cols="50"" name="descricao" placeholder="digíte uma descrição para o produto"></textarea>
            </div>
        
            <div class="form-group ">
                <input value="Procurar" type="file" name="foto" />
            </div>
            <br />
            <br />

            <input type="submit" name="cadastrar" value="CADASTRAR" class="btn btn-primary btn-lg">

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
        $largura = 1920;
        $altura = 1080;
        $tamanho = 1500000;

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
        $ordemPost = $_POST["ordem"];
        if (count($error) == 0) {
        
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            // Gera um nome único para a imagem
            $nome_imagem = 'carrossel-img' ."$ordemPost" . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../imagens/carrossel/" . $nome_imagem;
            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
            // Insere os dados no banco
            $sql = "REPLACE INTO carrossel(id, titulo, descricao, imagem) VALUES ('$ordemPost', '$titulo', '$descricao', '$nome_imagem')";

     
        
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

