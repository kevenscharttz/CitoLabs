<?php 

    //Verificação para saber se houve um request do tipo POST
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        die("Erro: Acesso inválido");
    }

    // -----------------------------------------
    /*
    REGRAS DE VALIDAÇÃO:

    - Todos os campos são de preenchimento obrigatório, exceto o textarea;
    - O primeiro campo de texto tem que ter entre 5 a 30 caracteres;
    - O campo da senha, tem que ter exatamente 12 caracteres.
    - Dos 3 checkboxes, pelo menos uma tem que estar selecionada;
    - Nos radiobuttons tem que existir uma opção selecionada;
    - No caso do textarea, não é obrigatório, mas se tiver texto tem que ter, no mínimo, 30 caracteres.    
    */

    $erros = [];

    //text
    if (empty($_POST['text_texto'])){
        $erros[] = 'ERRO: O campo obrigatório de texto está vazio';
    } else if (strlen($_POST['text_texto']) < 1 || strlen($_POST['text_texto']) > 30){
        $erros[] = 'ERRO: O campo obrigatório de texto tem que ter entre 5 e 30 caracteres';
    }

    //password
    if (empty($_POST['text_password'])){
        $erros[] = 'ERRO: O campo obrigatório de senha está vazio'; 
    } else if (strlen($_POST['text_password']) !== 12){
        $erros[] = 'ERRO: O campo obrigatório de senha deve conter exatamente 12 caracteres';
    }

    //select
    if (empty($_POST['select'])) {
        $erros[] = 'ERRO: O campo de país é obrigátorio, selecione um deles';
    }

    //checkboxes
    $checks = ['check_1', 'check_2', 'check_3'];
    $nullChecks = true;
    foreach ($checks as $check){
        if (!empty($_POST[$check])){
            $nullChecks = false;
            break;
        } else {
        }
    }

    if ($nullChecks){
        $erros[] = 'ERRO: Ao menos um das opções de multipla escolha deve estar selecionada';
    }

    //radio
    if (empty($_POST['radio'])){
        $erros[] = "ERRO: É obrigatório a seleção de uma das opções de escolha única.";
    }

    //text_area
    if (!empty($_POST['text_area'])){
        if(strlen($_POST['text_area']) < 30){
            $erros[] = 'ERRO: A área de texto deve conter pelo menos 30 caracteres (seu preenchimento não é obrigatório).';
        }
    }
    // -------------------------------------------------------
    // - | - Impressão das informações - | -
    if (!empty($erros)){
        echo '<h1>Erros encontrados</h1>';
        echo '<ol>';
            foreach ($erros as $erro){
                echo '<li>' . $erro . '</li>';
            }
        echo '</ol>';
    }  else {
        echo '<pre>';
        print_r($_POST);
    }
?>