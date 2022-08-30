<?php

    //Protegendo a aplicação contra navegação de URL indevida (é necessário estar logado para fazer isso)
    session_start();
    
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
        header('Location: index.php?login=error2');
    }
    
?>