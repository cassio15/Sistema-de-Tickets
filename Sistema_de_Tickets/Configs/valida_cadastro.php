<?php

    session_start();

    $cadastrado = 'SIM'; //Marcador

    //TRANSFORMANDO O ARQUIVO users.st EM UM ARRAY MULTIDIMENSIONAL
    //Transforma cada linha do arquivo user.st em um indice
    $users = array();
    $userArq = fopen('user.st', 'r'); //abri para leitura

    while(!feof($userArq)){ //feof retorna true quando encontra o final do arquivo. Estou fazendo a checagem inversa, então retornarei true para as linahs e false para o final do arquivo
        $linha = fgets($userArq); //fgets recupera cada linha do arquivo
        $users[] = $linha;
    }

    fclose($userArq); //Se abri, então preciso fechar

    $usuarios_cadastrados = array();

    //Transformando cada indice em um array
    foreach($users as $usersX){                    
        $users_dados = explode('|', $usersX); //Estou quebrando a string($ticket) em um array. Cada '#' da string é um indice
                       
        if(count($users_dados)< 4){ //Se o array tiver menos do que 4 indices, então irei ignora-lo
            continue;
        }

        $usuarios_cadastrados[] = $users_dados; //Salvando os arrays em um array multidimensional
    }


    //Capturando usuario e senha
    //Substituindo o caractere | por - porque usarei | como delimitador
    $usuario = str_replace('|', '-', $_POST['usuario2']);
    $senha = str_replace('|', '-', $_POST['senha2']);
    $confirmSenha = str_replace('|', '-', $_POST['senha3']);

    //Convertendo para minusculo
    $nome = strtolower($_POST['nome2']);
    $nome = ucwords($nome);

    $usuario = strtolower($usuario);
    $senha = strtolower($senha);
    $confirmSenha = strtolower($confirmSenha);


    //Validando os campos senha e confirmar senha

    if($senha != $confirmSenha){
        header('Location:../index.php?cadastro=pswd_error');
    } 
        //Evitando duplicidade de usuário (valida os 15 primeiros usuarios cadastrados)
        //Criei varios else if, pois as estruturas de repetição que utilizei não funcionaram conforme o planejado
        else if (isset($usuarios_cadastrados[0][1]) && $usuario == $usuarios_cadastrados[0][1]){
            header('Location:../index.php?cadastro=user_error');
        }  else if (isset($usuarios_cadastrados[1][1]) && $usuario == $usuarios_cadastrados[1][1]){
            header('Location:../index.php?cadastro=user_error');
        }  else if (isset($usuarios_cadastrados[2][1]) && $usuario == $usuarios_cadastrados[2][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[3][1]) && $usuario == $usuarios_cadastrados[3][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[4][1]) && $usuario == $usuarios_cadastrados[4][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[5][1]) && $usuario == $usuarios_cadastrados[5][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[6][1]) && $usuario == $usuarios_cadastrados[6][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[7][1]) && $usuario == $usuarios_cadastrados[7][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[8][1]) && $usuario == $usuarios_cadastrados[8][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[9][1]) && $usuario == $usuarios_cadastrados[9][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[10][1]) && $usuario == $usuarios_cadastrados[10][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[11][1]) && $usuario == $usuarios_cadastrados[11][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[12][1]) && $usuario == $usuarios_cadastrados[12][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[13][1]) && $usuario == $usuarios_cadastrados[13][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[14][1]) && $usuario == $usuarios_cadastrados[14][1]){
            header('Location:../index.php?cadastro=user_error');
        } else if (isset($usuarios_cadastrados[15][1]) && $usuario == $usuarios_cadastrados[15][1]){
            header('Location:../index.php?cadastro=user_error');
        }
    
     else{
        //SALVANDO USUARIO E SENHA NO ARRAY MULTIDIMENSIONAL
        $contador_id = count($usuarios_cadastrados) + 1; //Pego o proximo id

        //Criando um array com usuario e senha cadastrado
        $array_cadastrado = array($contador_id, $usuario, $senha, '2', $nome);

        //Inserindo no array multidimensional
        $usuarios_cadastrados[] = $array_cadastrado;




        //GRAVANDO O ARRAY MULTIDIMENSIONAL NO ARQUIVO user.st (para salvar o cadastro)
        $stringCadastros = array();

        foreach($usuarios_cadastrados as $arrayX){                    
            $users_dados2 = implode('|', $arrayX); //Estou juntando o array multidimensional em um unico array. O '|' é o delimitador       
        
            
            $stringCadastros[] = $users_dados2; //Salvando os indices em um array 
        }


        //removo o arquivo user.st para não duplicar os registros
        unlink('user.st');


        //Inserindo os indices no arquivo user.st
        foreach($stringCadastros as $stringCadastrosX){                    
            
            $stringF = $stringCadastrosX . PHP_EOL;

            $checagem = substr_count($stringCadastrosX, '|') ;
            
            if($checagem = 3){ //Fazendo mais uma checagem por segurança
                $userArq = fopen('user.st', 'a'); //Aqui a extensão do arquivo não importa. O 'a' é para abrir o arquivo somente para escrita
                fwrite($userArq, $stringF);
                fclose($userArq);
            }
            
        }

        header('Location:../index.php?cadastro=success'); //redirecionando para index.php
    }
?>