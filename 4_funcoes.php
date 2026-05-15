<?php


// funções = blocos de código que serão reutilizados

function boasVindas() {
    echo "Bem-vindo ao curso de PHP! <br><br>";
}   

boasVindas();


function boasVindas2($nome): void {
    echo "Seja bem-vindo, $nome! <br><br>";
}


boasVindas2("Renan");

$meuNome = "Paulo";

boasVindas2(nome: $meuNome);

function soma($a, $b) {
    return $a + $b;
}

$resultado = soma(5, 10);

echo "O resultado da soma é: $resultado <br><br>";

// funções da linguagem -> built in functions

$tamanho = strlen("Este é o meu texto");

echo "O tamanho do texto é: $tamanho <br><br>";

$cores = ["vermelho", "verde", "azul"];

array_push($cores, "amarelo");

print_r(value: $cores);


?>