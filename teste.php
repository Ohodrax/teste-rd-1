<?php

    $indice = 13;
    $soma = 0;

    for ($k=0; $k < $indice; $k++) { 
        $k = $k + 1;
        $soma = $soma + $k;
    }

    echo $soma;

    echo "<br>";
    echo "<br>";
    echo "<br>";

    // ----------------------------------------

    $nTeste = 89;

    $nAtual = 0;
    $nAtualSec = 0;

    $nInicial = 0;
    $nSecundario = 1;

    do {

        $nAtual = $nInicial + $nSecundario;
        // echo "$nInicial + $nSecundario = $nAtual<br>";

        $nInicial = $nSecundario;
        $nSecundario = $nAtual;

    } while ($nAtual < $nTeste);

    if ($nTeste == $nAtual) {
        echo "O número $nTeste faz parte da sequência de Fibonacci.";
    } else {
        echo "O número $nTeste não faz parte da sequência de Fibonacci.";
    }


    // 0 + 1 = 1
    // 1 + 1 = 2
    // 2 + 1 = 3
    // 3 + 2 = 5
    // 5 + 3 = 8
    // 8 + 5 = 13

    echo "<br>";
    echo "<br>";
    echo "<br>";

    // -----------------------------------

    $data = file_get_contents("dados.json");
    $faturamento = json_decode($data, true);
    
    $valores = array_filter(array_column($faturamento, "valor"), function($valor) {
        return $valor > 0; // Ignora dias sem faturamento
    });
    
    $menor = min($valores);
    $maior = max($valores);
    
    $media = array_sum($valores) / count($valores);
    
    $diasAcimaDaMedia = count(array_filter($valores, function($valor) use ($media) {
        return $valor > $media;
    }));
    
    echo "Menor faturamento: R$ " . number_format($menor, 2, ',', '.') . "\n";
    echo "<br>";
    echo "Maior faturamento: R$ " . number_format($maior, 2, ',', '.') . "\n";
    echo "<br>";
    echo "Dias acima da média: $diasAcimaDaMedia\n";
    echo "<br>";
    
    echo "<br>";
    echo "<br>";
    echo "<br>";

    // -----------------------------------
    
    $estados = [
        "SP" => 67836.43,
        "RJ" => 36678.66,
        "MG" => 29229.88,
        "ES" => 27165.48,
        "Outros" => 19849.53
    ];
    
    $total = array_sum($estados);
    
    foreach ($estados as $estado => $valor) {
        $percentual = ($valor / $total) * 100;
        echo "$estado: " . number_format($percentual, 2, ',', '.') . "%\n";
        echo "<br>";
    }
    
    echo "<br>";
    echo "<br>";
    echo "<br>";
    
    // -----------------------------------

    
    function inverterString($str) {
        $invertida = "";
        for ($i = strlen($str) - 1; $i >= 0; $i--) {
            $invertida .= $str[$i];
        }
        return $invertida;
    }
    
    $stringOriginal = "Exemplo de string";
    echo "<br>";
    echo "String Original: $stringOriginal\n";
    echo "<br>";
    echo "String Invertida: " . inverterString($stringOriginal) . "\n";
?>
