<?php

    // Variáveis e tipos de dados
    echo "Variáveis e Tipos de Dados <br><br>";


    /* 
     Comentário
     de múltiplas
     linhas
    */


     // Variáveis 
     $nome = "Renan"; // String

     echo "Olá meu nome é $nome<br><br>";

     $sobrenome = "Araújo";

     $nomeCompleto = $nome . " " . $sobrenome; // Concatenar strings

     echo "Meu nome completo é $nomeCompleto<br><br>";


     // inteiro 
     $idade = 30;

     echo "Eu tenho $idade anos.<br><br>";

     $somaIdade = $idade + 5;

     echo "$somaIdade<br><br>";

     // float - numeros quebrados
     $altura = 1.75;

     echo "Minha altura é $altura metros.<br><br>";

     $somaAltura = $altura + 0.25;

     echo "$somaAltura<br><br>";

     echo "Minha altura atualizada é $somaAltura metros.<br><br>";
     
     // boolean - true ou false

     $maiorDeIdade = true; // 1 

     $podeDirigir = false; // 0

     echo "$maiorDeIdade<br><br>";

     echo "$podeDirigir<br><br>";

     // arrays - listas

     $frutas = ["maçã", "banana", "laranja"];

     // indices -> posicoes dos elementos numa list
     // toda lista começa na posição 0


     echo "Primeira fruta => $frutas[0]<br><br>";
     echo "Segunda fruta => $frutas[1]<br><br>";
     echo "Terceira fruta => $frutas[2]<br><br>";


     $frutas[] = "abacaxi";

     echo "$frutas[3]<br><br>";


     // operadores 

     // +, -, *, /, %

     echo "Soma: " . (5 + 3) . "<br><br>";
     echo "Subtração: " . (10 - 4) . "<br><br>";
     echo "Multiplicação: " . (6 * 7) . "<br><br>";

     $a = 10;
     $b = 3;

     echo "Subtração: " . ($a - $b) . "<br><br>";
     echo "Multiplicação: " . ($a * $b) . "<br><br>";


     // ==, ===, != 

     $c = "10";


     // = -> atribuição
     // == -> comparação de valor
     // === -> identico (compara valor e tipo)

     echo "Igualdade: " . ($a == $c ? "Verdadeiro" : "Falso") . "<br><br>"; // compara valor

     echo "Identico: " . ($a === $c ? "Verdadeiro" : "Falso") . "<br><br>"; // compara valor e tipo
     echo "Identico: " . ($a === 10 ? "Verdadeiro" : "Falso") . "<br><br>"; // compara valor e tipo

     echo "Diferente: " . ($a != $c ? "Verdadeiro" : "Falso") . "<br><br>"; // compara valor

     echo "Diferente: " . ($a !== $c ? "Verdadeiro" : "Falso") . "<br><br>"; // compara valor e tipo


     // operadores lógico (tabela verdade)

     // && -> AND -> se as duas condições forem verdadeiras, o resultado é verdadeiro
     // || -> OR -> se pelo menos uma das condições for verdadeira, o resultado é verdadeiro
     // ! -> NOT -> inverte o valor lógico


     $idade = 20;
     $temCarteira = false;


     // true e !false -> true
     echo "Deve tirar a carteira? " . (($idade >= 18 && !$temCarteira) ? "Sim" : "Não") . "<br><br>";

     // true ou false -> true
     echo "É maior de idade?" . (($idade >= 18 || $temCarteira) ? "Sim" : "Não") . "<br><br>";


     // Operadores de atribuição

     $saldo = 100;

     // $saldo = $saldo + 50;
     $saldo += 100;

     echo "$saldo<br><br>";

     $saldo += 100;

     echo "$saldo<br><br>";

     $saldo *= 100;
     
     echo "$saldo<br><br>";

     $saldo -= 100;

     echo "$saldo<br><br>";

?>