<?php
function addition($case)
{
    $expression = explode("+", $case);
    $first = $expression[0];
    $second = $expression[1];
    $lengthSecond = strlen($second);

    echo " " . $first . PHP_EOL;
    echo "+" . $second . PHP_EOL;
    echo str_repeat("-", $lengthSecond + 1);
    echo PHP_EOL;

    $sum = (int)$first + (int)$second;
    $lengthSum = strlen((string)$sum);

    for ($j = $lengthSum; $j < $lengthSecond + 1; $j++) {
        echo " ";
    }

    echo $sum . PHP_EOL;
    echo PHP_EOL;
}

function subtraction($case)
{
    $expression = explode("-", $case);
    $first = $expression[0];
    $second = $expression[1];
    $lengthSecond = strlen($second);

    echo " " . $first . PHP_EOL;
    echo "-" . $second . PHP_EOL;

    echo str_repeat("-", $lengthSecond + 1);
    echo PHP_EOL;

    $difference = (int)$first - (int)$second;
    $length = strlen((string)$difference);
    for ($j = $length; $j < $lengthSecond + 1; $j++) {
        echo " ";
    }
    echo $difference . PHP_EOL;
    echo PHP_EOL;
}

function multiplication($case)
{
    $expression = explode("*", $case);
    $first = $expression[0];
    $second = $expression[1];

    $lengthFirst = strlen($first);
    $lengthSecond = strlen($second);
    $result = (int)$first * (int)$second;
    $lengthResult = strlen((string)$result);
    $spaces = $lengthResult - $lengthSecond - 1;

    if ($lengthSecond + 1 > $lengthFirst) {
        echo str_repeat(" ", $spaces);
        for ($i = $lengthFirst; $i < $lengthSecond + 1; $i++) {
            echo " ";
        }
        echo $first . PHP_EOL;
        echo str_repeat(" ", $spaces);
        echo "*" . $second . PHP_EOL;
        echo str_repeat(" ", $spaces);
        echo str_repeat("-", $lengthSecond + 1);
    }

    if ($lengthFirst > $lengthSecond + 1) {
        echo $first . PHP_EOL;
        for ($i = $lengthSecond + 1; $i < $lengthFirst; $i++) {
            echo " ";
        }
        echo "*" . $second . PHP_EOL;
        echo str_repeat("-", $lengthFirst);
    }
    echo PHP_EOL;

    $count = 0;
    $digitSecond = str_split($second);

    for ($i = $lengthSecond - 1; $i >= 0; $i--) {
        $multiply = (int)$digitSecond[$i] * (int)$first;
        echo str_repeat(" ", $i);
        echo $multiply . PHP_EOL;
        $count++;
    }
    if ($count > 1) {
        echo str_repeat("-", $lengthResult);
        echo PHP_EOL;
        echo $result . PHP_EOL;
    }
    echo PHP_EOL;
}

$testCases = 4;
$cases = ["12345+67890", "324-111", "325*4405", "1234*4"];

for ($i = 0; $i < $testCases; $i++) {
    if (strpos($cases[$i], "+")) {
        addition($cases[$i]);
    }
    if (strpos($cases[$i], "-")) {
        subtraction($cases[$i]);
    }
    if (strpos($cases[$i], "*")) {
        multiplication($cases[$i]);
    }
}