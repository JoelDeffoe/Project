<?php

function calcArrayElements(array $list)
{
    $output = array(
        'total' => array_sum($list),
        'min' => min($list),
        'max' => max($list),
        'avg' => 0
    );

    if (sizeof($list))
    {
        $output['avg'] = $output['total'] / sizeof($list);
    }

    return $output;
}

$numList = array(1, 5, 4, 100, 80, 90, 20, 10, 60, 13, 7, 101, 120);

print_r(calcArrayElements($numList));