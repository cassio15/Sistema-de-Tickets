<html> 
    <head>
        <meta charset="utf-8" />
        <title>Sistema de Tickets</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row justify-content-center mt-5 mb-2">
                    <div clas="col-md-12">
                        <h1 class="display-4 text-center"><strong>SISTEMA DE TICKETS</strong></h1>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <h2 class="texto lead text-center mb-4">CADASTRE-SE</h2>
                        <form action="configs/valida_cadastro.php" method="post">
                            <div class="form-group">
                                <input name="nome2" class="form-control" type="text" minlength='3' maxlength="40" placeholder="Nome completo"required>
                            </div>
                            <div class="form-group">
                                <input name="usuario2" class="form-control" type="text" minlength='3' placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                <input name="senha2" class="form-control" type="password" minlength='3' placeholder="Senha" required>
                            </div>
                            <div class="form-group">
                                <input name="senha3" class="form-control" type="password" minlength='3' placeholder="Confirmar senha" required>
                            </div>

                            <!--Se os campos de senha não forem iguais-->
                            <?php
                                if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'pswd_error'){                             
                            ?>
                                <div class="text-danger text-center mb-2">
                                    <strong>As senhas não conferem</strong>
                                </div>
                            <?php
                                }
                            ?>



                            <!--Se os campos de senha não forem iguais-->
                            <?php
                                if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'user_error'){                             
                            ?>
                                <div class="text-danger text-center mb-2">
                                    <strong>Usuario já existente!
                                        <br>
                                        Tente novamente
                                    </strong>
                                </div>
                            <?php
                                }
                            ?>



                            <!--Se o cadastro for realizado com sucesso-->
                            <?php
                                if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'success'){                             
                            ?>
                                <div class="text-success text-center mb-2">
                                    <strong>Usuário criado com sucesso!</strong>
                                </div>
                            <?php
                                }
                            ?>


                            <button class="btn btn-md btn-info btn-block mt-2" type="submit">Cadastar</button>
                        </form>
                    </div>
                

                    <div class="col-md-1 border-right border-left mr-3">
                    </div>


                    <div clas="col-md-4">
                        <h2 class="texto lead text-center mb-4">LOGIN</h2>
                        <form action="valida_login.php" method="post">
                            <div class="form-group">
                                <input name="usuario" class="form-control" type="text" minlength='3' placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <input name="senha" class="form-control" type="password" minlength='3' placeholder="Senha">
                            </div>

                            <!--Se houver erro na autenticação do login-->
                            <?php
                                if(isset($_GET['login']) && $_GET['login'] == 'error'){                             
                            ?>
                                <div class="text-danger text-center mb-2">
                                   <strong>Usuário ou senha inválido</strong>
                                </div>
                            <?php
                                }
                            ?>

                            <!--Se o usuario tentar navegar pela URL sem efeturar o login-->
                            <?php
                                if(isset($_GET['login']) && $_GET['login'] == 'error2'){
                            ?>
                                <div class="text-danger text-center mb-2">
                                    <strong>É necessário realizar o login
                                    <br>
                                    para prosseguir</strong>
                                </div>
                            <?php
                                }
                            ?>

                            <button class="btn btn-lg btn-info btn-block mt-2" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
