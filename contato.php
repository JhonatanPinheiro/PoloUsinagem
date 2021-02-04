<!DOCTYPE html>
<html lang="pt-br">
<?php require_once "cabecalho.html";?>

  <body id="contato">
    <?php require_once  "header.html";?>

		<div class="container">
      <div class="row">
      	<div class="col-md-12">
          <div class="card-body font-weight-bold">
            <form action="processar_email.php" method="post"  enctype="multipart/form-data">
            <?php if (isset($_GET['contato']) && $_GET['contato'] == 'erro'){ 
                echo " <div class='text-danger'>Sua mensagem não pode ser enviada, Tente novamente.</div>";}
                 ?>
                 <?php if (isset($_GET['contato']) && $_GET['contato'] == 'sucesso'){ 
                echo " <div class='text-danger'>Sua mensagem foi enviada, entraremos em contato em breve.</div>";}
                 ?>
              <div class="form-group">
								<label for="email">Informe seu e-mail <span class="informacoesObrigatorias">*</span>  </label>
								<input name="email" type="text" class="form-control" id="email" placeholder="polo_usinagem@dominio.com.br">
							</div>
              <div class="form-group">
                <label for="nome">Informe seu nome <span class="informacoesObrigatorias">*</span></label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome Completo">
              </div>
              <div class="form-group">
                <label for="cidade">Cidade <span class="informacoesObrigatorias">*</span></label>
                <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Sumaré-SP">
              </div>
              <div class="form-group">
                <label for="telefone">Telefone para contato <span class="informacoesObrigatorias">*</span></label>
                <input name="telefone" type="text" class="form-control" id="telefone1" placeholder="(19) 98181-7431">
              </div>
              <div class="form-group">
                <label for="nome_empresa">Nome da empresa</label>
                <input name="nome_empresa" type="text" class="form-control" id="nome_empresa" placeholder="Polo Usinagem">
              </div>
							<div class="form-group">
                <label for="pdf"><span> <i class="far fa-file-pdf"></i></span> Anexar desenho (Pdf)</label>
                <input name="pdf" type="file" class="form-control-file" id="pdf">
							</div>
              <div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea name="mensagem" class="form-control" id="mensagem" placeholder="Detalhes sobre o desenho, duvida sobre a empresa, entre outros..."></textarea>
							</div>
 
              <button onclick="" type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>

						</form>
					</div>
				</div>
      </div>
    </div>
<?php

      require_once "footer.html";


