<?php

/**
 * File Name: opcodes.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon May 17 13:57:10 2021
 */

$phpcode = 
'<?php
echo "Hello World";
$a = 1 + 1;
echo $a;
 ?>';

echo $phpcode;
echo PHP_EOL . '----' . PHP_EOL;
$tokens = token_get_all($phpcode);
var_dump($tokens);
