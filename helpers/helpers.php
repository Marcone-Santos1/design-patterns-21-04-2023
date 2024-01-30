<?php

if (!function_exists('dd')) {
    function dd(mixed ...$args)
    {
        var_dump($args);
        die();
    }
}