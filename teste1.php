<?php

$array = ['a', 10, 'b', 'hola', 122, 15];

$numbers = [];

$strings = [];

$maior = 0;

// SEPARANDO OS ARRAYS
for ($c = 0; $c < count($array); $c++)
{
    if (is_numeric($array[$c]))
    {
        array_push($numbers, $array[$c]);
    }
    else
    {
        array_push($strings, $array[$c]);
    }
}

// Maior valor
for ($c = 0; $c < count($numbers); $c++)
{
    if ($c === 0)
    {
        $maior = $numbers[$c];
    }
    else
    {
        $maior = $maior < $numbers[$c] ? $numbers[$c] : $maior;
    }
}

// Exibindo informações
echo '<h3>Array de Letras</h3>';
echo '<pre>';
print_r($strings);
echo '<pre>';
echo '<hr>';

echo '<h3>Array de Numeros</h3>';
echo '<pre>';
print_r($numbers);
echo '<pre>';
echo '<hr>';

echo '<h3>Maior Numero</h3>';
echo '<pre>';
print_r($maior);
echo '<pre>';
echo '<hr>';
