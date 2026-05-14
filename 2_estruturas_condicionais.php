<?php

    echo "Estruturas Condicionais <br><br>";
    

    // estruturas que usam operadores e comperações
    // para atingir resultados diferentes no programa

    // if, else, elseif

    $idade = 10;

    // if(COMPARACAO -> booleano(T/F)) { // EXECUTO }
    if ($idade >= 18) {
        echo "Você é maior de idade! <br><br>";
    } else {
        echo "Você é menor de idade! <br><br>";
    }

    // executo quando o if da falso 
    // else { // EXECUTA SE FALSO }
    $salario = 1000;

    if ($salario > 2000) {
        echo "O seu salário é bom! <br><br>";
    } else {
        echo "O seu salário é baixo! <br><br>";
    }


    // if -> se a op. é verdadeira
    // else -> se o if for falso

    // elseif CONDICAO INTERMEDIARIA 
    // if, else if, else
    $nota = 7.5;

    if ($nota > 9) {
        echo "Parabéns, você é um aluno excelente! <br><br>";
    } elseif ($nota >= 7) {
        echo "Parabéns, você é um aluno aprovado! <br><br>";
    } else {
        echo "Infelizmente, você foi reprovado! <br><br>";
    }


    // não tenho limite de else if, posso ter 100
    // sempre tenho que ter if 
    // posso ou nao ter 1 ou mais else if's
    // posso ou nao ter 1 else

    // > 100 = muito rápido 
    // > 80 = acima do limite 
    // > 60 = aceitavel
    // < = muito lento 


    $velocidade = 85;

    if ($velocidade > 100) {
        echo "Muito ráoido! <br><br>";
    } elseif ($velocidade > 80) {
        echo "Acima do limite! <br><br>";
    } elseif ($velocidade > 60) {
        echo "Aceitável! <br><br>";
    } else {
        echo "Muito lento! <br><br>";
    }


?>