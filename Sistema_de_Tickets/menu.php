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
                <div class="row justify-content-center mt-5 mb-2">
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
                                        <a class="link nav-link text-uppercase rounded mr-4" href="abrir_ticket.php">ABRIR TICKET</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="link nav-link text-uppercase rounded mr-4" href="consultar_ticket.php">CONSULTAR TICKET</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="link nav-link text-uppercase rounded mr-4" href="sair.php">SAIR</a>
                                    </li>
                                </ul>
                            </div>			
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
