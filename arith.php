<?php
function addition(string $case): string
{
    $output = "";
    $expression = explode("+", $case);
    $first = $expression[0];
    $second = $expression[1];
    $lengthFirst = strlen($first);
    $lengthSecond = strlen($second);
    if ($lengthFirst < $lengthSecond + 1) {
        $output .= str_repeat(" ", $lengthSecond + 1 - $lengthFirst);
    }
    $output .= $first . PHP_EOL;
    if ($lengthFirst > $lengthSecond + 1) {
        $output .= str_repeat(" ", $lengthFirst - $lengthSecond - 1);
    }
    $output .= "+" . $second . PHP_EOL;
    if ($lengthFirst < $lengthSecond + 1) {
        $output .= str_repeat("-", $lengthSecond + 1);
    } else {
        $output .= str_repeat("-", $lengthFirst);
    }
    $output .= PHP_EOL;

    $sum = (int)$first + (int)$second;
    $lengthSum = strlen((string)$sum);

    for ($j = $lengthSum; $j < $lengthSecond + 1; $j++) {
        $output .= " ";
    }

    $output .= $sum . PHP_EOL;
    $output .= PHP_EOL;
    return $output;
}

function subtraction(string $case): string
{
    $output = "";
    $expression = explode("-", $case);
    $first = $expression[0];
    $second = $expression[1];
    $lengthFirst = strlen($first);
    $lengthSecond = strlen($second);
    if ($lengthFirst < $lengthSecond + 1) {
        $output .= str_repeat(" ", $lengthSecond + 1 - $lengthFirst);
    }
    $output .= $first . PHP_EOL;
    if ($lengthFirst > $lengthSecond + 1) {
        $output .= str_repeat(" ", $lengthFirst - $lengthSecond - 1);
    }
    $output .= "-" . $second . PHP_EOL;
    if ($lengthFirst < $lengthSecond + 1) {
        $output .= str_repeat("-", $lengthSecond + 1);
    } else {
        $output .= str_repeat("-", $lengthFirst);
    }
    $output .= PHP_EOL;

    $difference = (int)$first - (int)$second;
    $length = strlen((string)$difference);

    for ($j = $length; $j < $lengthSecond + 1; $j++) {
        $output .= " ";
    }

    $output .= $difference . PHP_EOL;
    $output .= PHP_EOL;
    return $output;
}

function multiplication(string $case): string
{
    $output = "";
    $expression = explode("*", $case);
    $first = $expression[0];
    $second = $expression[1];

    $lengthFirst = strlen($first);
    $lengthSecond = strlen($second);
    $result = (int)$first * (int)$second;
    $lengthResult = strlen((string)$result);
    $spaces = $lengthResult - $lengthSecond - 1;

    if ($lengthSecond + 1 > $lengthFirst) {
        $output .= str_repeat(" ", $spaces);
        for ($i = $lengthFirst; $i < $lengthSecond + 1; $i++) {
            $output .= " ";
        }
        $output .= $first . PHP_EOL;
        $output .= str_repeat(" ", $spaces);
        $output .= "*" . $second . PHP_EOL;
        $output .= str_repeat(" ", $spaces);
        $output .= str_repeat("-", $lengthSecond + 1);
    }

    if ($lengthFirst > $lengthSecond + 1) {
        $output .= $first . PHP_EOL;
        for ($i = $lengthSecond + 1; $i < $lengthFirst; $i++) {
            $output .= " ";
        }
        $output .= "*" . $second . PHP_EOL;
        $output .= str_repeat("-", $lengthFirst);
    }
    $output .= PHP_EOL;

    $count = 0;
    $digitSecond = str_split($second);

    for ($i = $lengthSecond - 1; $i >= 0; $i--) {
        $multiply = (int)$digitSecond[$i] * (int)$first;
        $output .= str_repeat(" ", $i);
        $output .= $multiply . PHP_EOL;
        $count++;
    }
    if ($count > 1) {
        $output .= str_repeat("-", $lengthResult);
        $output .= PHP_EOL;
        $output .= $result . PHP_EOL;
    }
    $output .= PHP_EOL;
    return $output;
}

echo "Enter the number of test cases: ";
$testCases = (int)trim(fgets(STDIN));
$cases = [];
for ($i = 0; $i < $testCases; $i++) {
    echo "Enter test case " . ($i + 1) . ": ";
    $cases[] = trim(fgets(STDIN));
}
foreach ($cases as $case) {
    if (strpos($case, "+")) {
        echo addition($case);
    } elseif (strpos($case, "-")) {
        echo subtraction($case);
    } elseif (strpos($case, "*")) {
        echo multiplication($case);
    }
}
