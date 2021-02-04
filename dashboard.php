<?php require_once 'session/acesso_autorizado.php';?>

<?php require_once "cabecalho.html";?>
<link rel="stylesheet" href="css/dashboard.css">

<?php
    require_once 'session/conexao.php' ;
    
    ?>
    <body>
        <h1 class="display-4">DASHBOARD ADMINISTRATIVO</h1>
        <div class="nav-bar menu">
            <hr />
                <div class="indent">
                    <ul class="nav nav-bar">
                        <li class="nav-item">
                        <a class="nav-link" href="session/banco.php"> <img src="imagens\icones\base-de-dados.ico" class="icon icon-sm icone" alt="Criar banco de dados"></a>
                        <?php if (isset($_GET['page']) && $_GET['page'] == 'banco_criado_sucesso') 
                            echo " <script>alert('Banco criado com sucesso!')</script>"
                        ?>     
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="session/tabelas_bd.php"> <img src="imagens\icones\consulta-produto-fresamento.ico" class="icon icon-sm icone" alt="Criar tabelas de dados"></a>
                        <?php if (isset($_GET['page']) && $_GET['page'] == 'tabela_criado_sucesso') 
                            echo " <script>alert('Tabela criada com sucesso!')</script>"
                        ?>
                        </li>
                        <li class="nav-item" >
                        <a class="nav-link" href="dashboard.php?page=inserir-dados"><img src="imagens\icones\inserir-de-dados-usuario.ico" class="icon icon-sm icone" alt="inserir usuário"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=consulta-usuario"><img src="imagens\icones\consulta-usuarios.ico" class="icon icon-sm icone" alt="Consultar dados de usuários"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=inserir-produtos-fresamento"><img src="imagens\icones\inserir-produto-fresamento.ico" class="icon icon-sm icone" alt="Cadastrar produtos de fresamento"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link danger" href="dashboard.php?page=excluir-produtos-fresamento"><img src="imagens\icones\consulta-produto-fresamento.ico" class="icon icon-sm icone" alt="Excluir produtos de fresamento"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=inserir-produtos-torneamento"><img src="imagens\icones\inserir-produto-torneamento.ico" class="icon icon-sm icone" alt="Cadastrar produtos de torneamento"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link danger" href="dashboard.php?page=excluir-produtos-torneamento"><img src="imagens\icones\consulta-produto-torneamento.ico" class="icon icon-sm icone" alt="Excluir produtos de torneamento"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?page=carrossel"><img src="imagens\icones\editar-carrossel.ico" class="icon icon-sm icone" alt="Alterar imagens do carrousel"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link"  href="session/logout.php"><img src="imagens\icones\sair.ico" class="icon icon-sm icone" alt="Sair"></a>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="iframe">
            <?php 
            
                if($_GET['page'] == 'consulta-usuario'){
                    echo "
                    <div class='embed-responsive embed-responsive-21by9'>
                        <iframe class='embed-responsive-item' src='session/consulta_dados.php'></iframe>
                    </div>
                ";
                }
                if($_GET['page'] == 'inserir-dados'){
                    echo "
                    <div class='embed-responsive embed-responsive-21by9'>
                        <iframe class='embed-responsive-item' src='session/inserir_dados.php'></iframe>
                    </div>
                ";
                }
                if($_GET['page'] == 'inserir-produtos-fresamento'){
                    echo "
                    <div class='embed-responsive embed-responsive-21by9'>
                        <iframe class='embed-responsive-item' src='session/inserir_produtos_fresamento.php'></iframe>
                    </div>
                ";
                } 
                if($_GET['page'] == 'excluir-produtos-fresamento'){
                    echo "
                    <div class='embed-responsive embed-responsive-21by9'>
                        <iframe class='embed-responsive-item' src='session/excluir_produtos_fresamento.php'></iframe>
                    </div>
                ";
                } 
                if($_GET['page'] == 'inserir-produtos-torneamento'){
                    echo "
                    <div class='embed-responsive embed-responsive-21by9'>
                        <iframe class='embed-responsive-item' src='session/inserir_produtos_torneamento.php'></iframe>
                    </div>
                ";
                } 
                if($_GET['page'] == 'excluir-produtos-torneamento'){
                    echo "
                    <div class='embed-responsive embed-responsive-21by9'>
                        <iframe class='embed-responsive-item' src='session/excluir_produtos_torneamento.php'></iframe>
                    </div>
                ";
                } 
                if($_GET['page'] == 'carrossel'){
                    echo "
                    <div class='embed-responsive embed-responsive-21by9'>
                        <iframe class='embed-responsive-item' src='session/carrossel.php'></iframe>
                    </div>
                ";
                }else{
                    echo "<div class='texto-boas-vindas'>
                            <h2> Bem vindo <h2>
                        </div>". $_SESSION['user'];
                };
                
            ?>

        </div>
    </body>