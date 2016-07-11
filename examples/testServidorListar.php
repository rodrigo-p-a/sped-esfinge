<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include_once '../bootstrap.php';

use NFePHP\Esfinge\Tools;

try {
    //instanciar a classe passando a configuração básica
    $tools = new Tools('../config/config.json');
    //definir o periodo de competência
    $tools->setCompetencia('201602');
    //listar dados servidor
    //NOTA: deixando o campo em branco '' ele não será incluso no XML
    //NOTA: não passando o campo ele também não será incluso no XML
    $filtros[] = [
        'campo' => 'numeroCPF',
        'valor' => '12345678901234',
        'tipo' => '',
        'tamanho' => '',
        'sufixo_operador' => ''
    ];
    $data = [
        'pagina' => '1',
        'filtros' => $filtros
    ];
    $retorno = $tools->servidor($data, 'L');
    //################
    // Essa variável $retorno irá conter a resposta do TCE na form ade um ARRAY
    // o conteudo do ARRAY irá variar em função da consulta
    //################
    //finalizar
    $retorno = $tools->token($tools::TK_FINALIZA);
} catch (Exception $e) {
    echo "Houve uma exceção: " . $e->getMessage();
}    
