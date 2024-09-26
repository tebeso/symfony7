<?php

/**
 * @param $path
 *
 * @return string
 */
function asset($path): string
{
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . trim($path, '/');
}