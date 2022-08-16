<?php

function echonl($arg)
{
    $type = gettype($arg);

    switch ($type) {
        case 'array':
        case 'object':
            print_r($arg) . PHP_EOL . PHP_EOL;
            break;
        case 'string':
        default:
            echo $arg . PHP_EOL . PHP_EOL;
    }
}