<?php

    session_start();

    //Substituindo o caractere # por -
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);
    
    //Concatenando as informações do ticket em uma string (estou usando o # como delimitador)
    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; //PHP_EOL faz quebra de linha

    //Salvando a string em um arquivo
    $arquivo = fopen('Configs/arquivo.st', 'a'); //Aqui a extensão do arquivo não importa. O 'a' é para abrir o arquivo somente para escrita
    fwrite($arquivo, $texto);
    fclose($arquivo);
    
    header('Location: abrir_ticket.php?ticket=success'); //Apos salvar o ticket, irei voltar para a tela do de abertura de ticket
    
?>