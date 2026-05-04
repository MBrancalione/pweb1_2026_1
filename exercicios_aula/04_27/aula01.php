<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "arthur é um gostoso<br>";
        $nome = "Arthur";
        $idade = 18;
        $notas = [5,7,10,9];
        echo "<br>$nome tem $idade anos.";
        if ($idade>=18){
            echo '<br>É maior de idade!';
        } else{
            echo '<br>É menor de idade!';
        }
        
        echo "<br>";
        /*print_r($notas); //imprimir vetores*/
        for($i = 0; $i<count($notas); $i++){
            echo $notas[$i]."<br>";
        }

        echo "<br>";
        //diferentemente do if normal, esse é um for dinâmico, não é necessário informar a inicialização, nem o increment.
        foreach($notas as $item){
            echo $item."<br>";
        }

        $nomes = ["Arhur", "Brenan"];
        echo "<br>";
        for($i = 0; $i<count($nomes); $i++){
            echo $nomes[$i]."<br>";
        }

        echo "<br>";
        foreach($nomes as $item){
            echo $item."<br>";
        }

        //vetores associativos
        $carro = ['modelo' => "mustang", 'cor' => "preto"];
        echo $carro['modelo']. " - " .$carro['cor'];

        //matrizes
        $carros = [
            ['modelo' => "mustang", 'cor' => "preto"],
            ['modelo' => "camaro", 'cor' => "amarelo"]
        ];

    //para nao precisar criar um for dentro de outro, podemos usar o foreach para percorrer a matriz, e dentro do foreach, criar um for para percorrer o vetor associativo.
        foreach($carros as $indice => $carro){
            echo $indice + 1;
            echo "Modelo: " . $carro['modelo'] . " - Cor: " . $carro['cor'] . "<br>";
        }

        //metodo post é enviado diretamente para o servidor, e o metodo get é enviado para a url, e pode ser visto por qualquer pessoa, e tem um limite de caracteres.
        //variaveis globais são variaveis que podem ser acessadas em qualquer parte do código, nativas do php, e variaveis locais são variaveis que só podem ser acessadas dentro de uma função ou bloco de código.
    ?>


    <p>Meu site sobre <?= $carro['modelo']. " - " .$carro['cor'] ?></p>

    <?php 
    include "./aula02.php";?>

     
</body>
</html> 