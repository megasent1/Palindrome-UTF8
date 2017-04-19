<?php
mb_internal_encoding('utf8'); // set encoding for UTF-8
require_once ('Palindrome.php'); // load class file

$pal = new Palindrome(); // create new object for palindrome
$pal->testString("Аргентина манит негра"); // tests
$pal->testString('Sum summus mus'); // tests
$pal->testString('Тестируем не палиндром'); // tests
$pal->testString('Аргентина манит негра раз А роза упала на лапу Азора два три'); // tests