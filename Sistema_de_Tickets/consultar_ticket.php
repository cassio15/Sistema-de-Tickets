<?php
    require_once "validador_acesso.php";
?>

<?php
    $tickets = array();

    $arquivo = fopen('Configs/arquivo.st', 'r'); //'r' para abrir o arquivo somente para leitura
    
    while(!feof($arquivo)){ //feof retorna true quando encontra o final do arquivo. Estou fazendo a checagem inversa, então retornarei true para as linahs e false para o final do arquivo
        $registro = fgets($arquivo); //fgets recupera cada linha do arquivo
        $tickets[] = $registro;
    }

    fclose($arquivo); //Se abri, então preciso fechar
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
                                        <a class="link nav-link text-uppercase text-warning bg-dark rounded mr-4 pl-3 pr-3" href="sair.php">SAIR</a>
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
                    <div class="card" style="min-width:548px; max-width:548px">
                        <div class="bg-info text-light card-header text-center">
                            <h4 class="lead"><strong>CONSULTA DE TICKETS ABERTOS</strong></h4>
                        </div>

                        <div class="card-body">
                            <?php foreach($tickets as $ticket){?> <!--Usando tag curta do php-->
                                
                                <?php
                                    $ticket_dados = explode('#', $ticket); //Estou quebrando a string($ticket) em um array. Cada '#' da string é um indice
                                    
                                    //Restringindo a visualização dos tickets. O perfil_id 1 é o perfil de administrador. Esse perfil não passa por restrição de visualização dos chamados
                                    if($_SESSION['perfil_id'] == 2){ //Se o perfil_id é 2 (perfil de usuario comum)
                                        if($_SESSION['id'] != $ticket_dados[0]){ //Se o meu id de usuario for diferente do id de usuario do ticket, então não irei visualizar ele
                                            continue; //faz pular o ticket
                                        }
                                    }
                                    
                                    if(count($ticket_dados)< 4){ //Se o $ticket_dados tiver menos do que 4 indices, então irei ignora-lo. Isso é para evitar a impressão da ultima linha do 'arquivo.hd', porque ela vem em branco.
                                        continue;
                                    }                          
                                ?>

                                <div class="card mb-5 bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title lead text-center mb-4"><strong><?=$ticket_dados[1]?></strong></h5> <!--Usando tag de impressão do PHP para imprimir o Titulo-->

                                        <h6 class="card-title text-muted mb-2">Categoria: <?=$ticket_dados[2]?></h6> <!--Usando tag de impressão do PHP para imprimir a Categoria-->
                                        
                                        <p class="card-text text-justify"><?=$ticket_dados[3]?></p> <!--Usando tag de impressão do PHP para imprimir a Descrição-->
                                    </div>
                                </div>

                                                            
                            <?php } ?> <!--fechando o bloco foreach-->
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
