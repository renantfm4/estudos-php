<?php 


 echo "Laços/Estruturas de repetição <br><br>";

 // while, do while, for

 // for => parece ser mais complexo, mas é o preferido

 // repetir um código x vezes

 // onde x ela é baseada numa condição
 // quando a gente 'ultrapassa' satisfaz essa condição a gente sai do loop


 // for (INCREMENTADOR; CONDIÇÃO; INCREMENTO) { // EXECUTO }
 for ($i = 0; $i <= 10; $i++) {
    echo "Número $i <br>";
 }

 for ($j = 20; $j > 10; $j--) {
    echo "Diminuindo J: $j <br>";
 }


 // while

 $contador = 1;

 while ($contador <= 10) {
    echo "Contador: $contador <br>";
    $contador++;
 }

 // loop infinito -> eu defino errado uma condição
 // de finalização de loop

 // exemplo:

  // while ($contador <= 10) {
  //  echo "Contador: $contador <br>";
  //  $contador--;         // vai de 1 para 0, -1, -2... nunca chega a 10
  // }

  // foreach -> array

  $frutas = ["maçã", "uva", "banana", "laranja"];

  foreach ($frutas as $fruta) {
    echo "Fruta: $fruta <br>";
  }

  // arrays associativos chave => valor

  $pessoas = [
      "João" => 400,
      "Maria" => 300,
      "Pedro" => 200
  ];

  echo '-> ' . $pessoas["João"] . "<br>"; // 400

  foreach ($pessoas as $nome => $dinheiro) {
    echo "$nome ganha: $dinheiro <br>";
  }

?>