<?php

$iniciar = curl_init('http://localhost/API_TEST/public_html/api/produto');

curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);


$dados = array(
    'nome' => $_POST['produto'],
    'valor' => $_POST['preco'],
);

curl_setopt($iniciar, CURLOPT_POST, true);
curl_setopt($iniciar, CURLOPT_POSTFIELDS, $dados);

curl_exec($iniciar);

curl_close($iniciar);

header("Location: index.php");