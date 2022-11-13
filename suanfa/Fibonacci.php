<?php
/**
 * File Name: Fibonacci.php
 * Author: songyue
 * mail: songyue118@gmail.com
 * Created Time: Mon Jun 28 11:16:50 2021
 */
function Fibonacci($number)
{
    if($number == 1 || $number == 2) {
        return 1;
    }else{
        return Fibonacci($number-1) + Fibonacci($number-2);
    }
}

$number = 10;
for($i = 1; $i <= $number; $i++ ) {
    //echo $i. ': '. Fibonacci($i) . ' ';
    echo Fibonacci($i) . ' ';
}

echo PHP_EOL;

function Fibonacci2($n)
{
    $num1 = 1;
    $num2 = 1;

    $counter = 1;
    while($counter <= $n)
    {
        echo  $num1 . ' ';
        $num3 = $num1 + $num2;
        
        $num1 = $num2;
        $num2 = $num3;

        $counter = $counter + 1;

    }
}

echo Fibonacci2(10);
echo PHP_EOL;
