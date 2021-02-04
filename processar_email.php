        <!-- codigo requisição -->
        <?php
      $from = "Meuemail@gmail.com";
      $assunto = "Contato do site";
      $email = $_REQUEST['email'];
      $nome = $_REQUEST['nome'];
      $cidade = $_REQUEST['cidade'];
      $telefone = $_REQUEST['telefone'];
      $nome_empresa = $_REQUEST['nome_empresa'];
      $pdf = $_REQUEST['pdf'];
      $mensagem = $_REQUEST['mensagem'];

          $corpoEmail = "<strong> Mensagem de Contato  <br> <br></strong>";
          $corpoEmail .= "<strong> Nome: </strong> $nome";
          $corpoEmail .= "<br><strong> E-mail: </strong> $email";
          $corpoEmail .= "<br><strong> Telefone: </strong> $telefone";
          $corpoEmail .= "<br><strong> Cidade: </strong> $cidade";
          $corpoEmail .= "<br><strong> Nome da empresa: </strong> $nome_empresa";
          $corpoEmail .= "<br><strong> Mensagem: </strong> $mensagem";
          $header = "Content-Type: text/html; charset= utf-8 \n";
          $header .= "From: $email Reply-to: $email \n";


          @mail($from, $assunto, $corpoEmail, $header); ?>

<script>
 </script>

<?php
if(!isset($_REQUEST['mensagem']) || !isset($_REQUEST['email']) || !isset($_REQUEST['nome'])){
header("Location: contato.php?contato=sucesso");
}else{
  header("Location: contato.php?contato=erro");
}
