<?php

function elementCount($case)
{
    $xCount = substr_count($case, 'X');
    $oCount = substr_count($case, 'O');
    return [$xCount, $oCount];
}

function winner($case)
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

function isValid($xCount, $oCount, $xWin, $oWin)
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

$testCases = 2;
$case = ["X.OOO.XXX", "O.XXX.OOO"];

for ($i = 0; $i < $testCases; $i++) {
    $count = elementCount($case[$i]);
    $xCount = $count[0];
    $oCount = $count[1];

    $winner = winner($case[$i]);
    $xWin = $winner[0];
    $oWin = $winner[1];

    $isValid = isValid($xCount, $oCount, $xWin, $oWin);

    if ($isValid) {
        echo "yes" . PHP_EOL;
    } else {
        echo "no" . PHP_EOL;
    }
}
