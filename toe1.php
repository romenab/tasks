<?php

function elementCount(string $case): array
{
    $xCount = substr_count($case, 'X');
    $oCount = substr_count($case, 'O');
    return [$xCount, $oCount];
}

function winner(string $case): array
{
    $element = str_split($case);
    $winnerCombinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8],
        [0, 3, 6], [1, 4, 7], [2, 5, 8],
        [0, 4, 8], [2, 4, 6]
    ];
    $xWin = 0;
    $oWin = 0;
    foreach ($winnerCombinations as $w) {
        if ($element[$w[0]] == $element[$w[1]] && $element[$w[1]] == $element[$w[2]]) {
            if ($element[$w[0]] == 'X') {
                $xWin++;
            } elseif ($element[$w[0]] == 'O') {
                $oWin++;
            }
        }
    }
    return [$xWin, $oWin];
}

function isValid(int $xCount, int $oCount, int $xWin, int $oWin): bool
{
    if ($xCount < $oCount) {
        return false;
    }
    if ($xWin > 0 && $oWin > 0) {
        return false;
    }
    if ($xWin > 0 && $xCount != $oCount + 1) {
        return false;
    }
    if ($oWin > 0 && $xCount != $oCount) {
        return false;
    }
    return true;
}


echo "Enter the number of test cases: ";
$testCases = (int)trim(fgets(STDIN));
$cases = [];
for ($i = 0; $i < $testCases; $i++) {
    echo "Enter test case " . ($i + 1) . ": ";
    $input = trim(fgets(STDIN));
    if (strlen($input) === 9 && (preg_match('/^[XO.]+$/', $input))) {
        $cases[] = $input;
    } else {
        echo "Invalid input. Each case must be exactly 9 characters and contain only '.', 'X' or 'O'." . PHP_EOL;
        $i--;
    }
}

foreach ($cases as $case) {
    $count = elementCount($case);
    $xCount = $count[0];
    $oCount = $count[1];

    $winner = winner($case);
    $xWin = $winner[0];
    $oWin = $winner[1];

    $isValid = isValid($xCount, $oCount, $xWin, $oWin);

    if ($isValid) {
        echo "yes" . PHP_EOL;
    } else {
        echo "no" . PHP_EOL;
    }
}

