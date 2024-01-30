<?php

if (!function_exists('dd')) {
    function dd(mixed $arg, ...$args)
    {
        ($args) ? var_dump($arg, $args) : var_dump($arg);
        die();
    }
}