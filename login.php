
<!DOCTYPE html>
<html lang="pt-br">
 <?php require_once "cabecalho.html";?>
 <link rel="stylesheet" href="css/login.css">

  <body id="login">
    <?php require_once "header.html"; ?>
    <?php if(isset($_SESSION['']))
      ob_start();
      header('location: dashboard.php?page=logado');
      ob_end_clean();
   ?>
      
      <section id="login" class=""> <!-- Start Section Home -->
          <div class="container"><!-- Start Div Container -->
                  <div class="row">  <!-- Start Div Row -->
                    <div class="col-md-6"> <!-- Start Div Col-md-12 -->

                          <div class="card-login mt-5 mb-5">
                            <div class="card">
                              <div class="card-header text-secondary">
                                Login
                              </div>
                              <div class="card-body">
                                <form action="session/validacao.php" method="POST">
                                  <div class="form-group">
                                    <label for="usuario">Nome de usuário</label>
                                    <input name="usuario" type="text" class="form-control" placeholder="Usuário">
                                  </div>
                                  <div class="form-group mb-5">
                                    <label for="senha">Sua</label>
                                    <input name="senha" type="password" class="form-control" placeholder="Senha">
                                  </div>

                                  <button class="btn btn-lg btn-info btn-block text-white" type="submit">Entrar</button>

                                  <?php if (isset($_GET['login']) && $_GET['login'] == 'invalido') 

                                   echo " <div class='text-danger'>Usuário ou Senha inválido(s)</div>"  ?>
                                </form>
                              </div>
                            </div>
                        <br><br>
                    </div>  <!-- End Div Col-md-12 -->
              </div> <!-- End Div Row -->
            </div> <!-- End Div Container -->
      </section> <!-- End Section Home -->
     

      <?php require_once "footer.html"; ?>
          </body>
        </html>
