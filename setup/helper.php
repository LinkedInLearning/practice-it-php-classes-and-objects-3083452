<?php

function echonl($arg, $beautify = false)
{
    $type = gettype($arg);

    switch ($type) {
        case 'array':
        case 'object':
            $beautify 
                ? print_r($arg) . PHP_EOL . PHP_EOL
                : var_dump($arg) . PHP_EOL . PHP_EOL;
            break;
        case 'string':
        default:
            echo $arg . PHP_EOL . PHP_EOL;
    }
}