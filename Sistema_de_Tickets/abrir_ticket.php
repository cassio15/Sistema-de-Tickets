<?php
    require_once "validador_acesso.php"; //incorporando o script
?>

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
                <div class="row justify-content-center mt-5 mb-5">
                    <div clas="col-md-12">
                        <h1 class="display-4 text-center"><strong>SISTEMA DE TICKETS</strong></h1>
                    </div>
                </div>
            </div>

            <div class="container mb-3">
                <div class="row justify-content-center">
                    <div clas="col-md-12">
                        <nav class="navbar navbar-expand">
                            <div id="nav-principal">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="link nav-link text-uppercase text-light bg-dark rounded mr-4" href="abrir_ticket.php">ABRIR TICKET</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="link nav-link text-uppercase text-light bg-dark rounded mr-4" href="consultar_ticket.php">CONSULTAR TICKET</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="link nav-link text-uppercase text-warning bg-dark rounded mr-4 pr-3 pl-3" href="sair.php">SAIR</a>
                                    </li>
                                </ul>
                            </div>			
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section>            
            <div class="container largura">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header bg-info text-light text-center">
                            <h4 class="lead"><strong>ABRIR UM NOVO TICKET</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="regista_ticket.php" method="post">
                                        <div class="form-group mb-5">
                                            <label>Título</label>
                                            <input class="form-control" name="titulo" type="text" style="min-width:500px;" maxlength="100" placeholder="Título do Ticket" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>Categoria</label>
                                            <select name="categoria" class="form-control">
                                                <option>Suporte no sistema</option>
                                                <option>Computador/monitor não liga</option>
                                                <option>Computador travando</option>
                                                <option>Defeito mouse/teclado</option>
                                                <option>Defeito impressora</option>
                                                <option>Liberação de acesso</option>
                                                <option>Instalação de programas</option>
                                                <option>Instalação de equipamentos</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Descrição</label>
                                            <textarea name="descricao" class="form-control" maxlength="500" rows="5" placeholder="Detalhe o problema" required></textarea>
                                        </div>

                                        <!--Exibindo mensagem de sucesso ao enviar ticket-->
                                        <?php
                                            if(isset($_GET['ticket']) && $_GET['ticket'] == 'success'){
                                        ?>
                                            <div class="text-success text-center mb-2">
                                                <strong>Ticket enviado com sucesso!</strong>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                        
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <button class="btn btn-md btn-info btn-block" type="submit">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="border rounded bg-warning">                                       
                                    <p class="ml-1 mr-2 mb-1 mt-1 card-text text-right"><strong class="text-dark">Logado por: </strong> <strong class="text-dark"><?=$_SESSION['nome']?></strong></p> <!--Usando tag de impressão do PHP para imprimir a Descrição-->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>