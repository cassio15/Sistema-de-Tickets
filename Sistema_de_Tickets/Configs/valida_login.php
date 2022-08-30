<?php
    session_start(); //Pegando os dados sessão de login

    //TRANSFORMANDO O ARQUIVO users.st EM UM ARRAY MULTIDIMENSIONAL
    //Transforma cada linha do arquivo user.st em um indice
    $users = array();
    $userArq = fopen('Configs/user.st', 'r'); //abri para leitura

    while(!feof($userArq)){ //feof retorna true quando encontra o final do arquivo. Estou fazendo a checagem inversa, então retornarei true para as linahs e false para o final do arquivo
        $linha = fgets($userArq); //fgets recupera cada linha do arquivo
        $users[] = $linha;
    }

    fclose($userArq); //Se abri, então preciso fechar


    $usuarios_cadastrados = array();

    //Transformando cada indice em um array
    foreach($users as $usersX){                    
        $users_dados = explode('|', $usersX); //Estou quebrando a string($ticket) em um array. Cada '#' da string é um indice
                       
        if(count($users_dados)< 4){ //Se o $ticket_dados tiver menos do que 4 indices, então irei ignora-lo. Isso é para evitar a impressão da ultima linha do 'arquivo.hd', porque ela vem em branco.
            continue;
        }

        $usuarios_cadastrados[] = $users_dados; //Salvando os arrays em um array multidimensional
    }


    //CAPTURANDO USUARIO E SENHA CADASTRADO E INSERINDO NO ARRAY MULTIDIMENSIONAL
    //Capturando usuario e senha
    $usuario = $_POST['usuario2'];
    $senha = $_POST['senha2'];

    $nome = strtolower($_POST['nome2']);
    $nome = ucwords($nome);


    //Substituindo o caractere | por - porque usarei | como delimitador
    $usuario = str_replace('|', '-', $_POST['usuario2']);
    $senha = str_replace('|', '-', $_POST['senha2']);

    //transformando para minusculo
    $usuario = strtolower($usuario);

    $contador_id = count($usuarios_cadastrados) + 1; //Pego o proximo id

    //Criando um array com usuario e senha cadastrado
    $array_cadastrado = array($contador_id, $usuario, $senha, '2');

    //Inserindo no array multidimensional
    $usuarios_cadastrados[] = $array_cadastrado;
   


    $user_autenticado = false;
    $user_id = null;
    $user_perfil_id = null;
    $perfis = array(1=> 'Admin', 2=> 'local');
   
    //Chegando se o login foi efetuado com sucesso
    foreach($usuarios_cadastrados as $user){
        if($user['1'] == $_POST['usuario'] && $user['2'] == $_POST['senha'] && $_POST['usuario'] != '' && $_POST['senha'] != ''){
            $user_autenticado = true;
            $user_id = $user['0'];
            $user_perfil_id = $user['3'];
            $nome_completo = $user['4'];
        }
    }

    if($user_autenticado){
        $_SESSION['autenticado'] = 'SIM'; //Criando indice
        $_SESSION['id'] = $user_id; //Criando indice
        $_SESSION['perfil_id'] = $user_perfil_id; //Criando indice
        $_SESSION['nome'] = $nome_completo; //Criando indice
        header('Location: abrir_ticket.php'); //redirecionando para menu.php
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=error'); //redirecionando para index.php
    }

?>