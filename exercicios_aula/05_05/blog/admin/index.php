<?php
include_once './database/db.class.php';

//instaciar um objeto da classe DB
$conn = new db('usuario');

$dados = [
    'nome' => 'João',
    'telefone' => '123456789',
    'email' => 'joao@example.com'
];

$conn->store($dados);
echo "Você está no index caralho";