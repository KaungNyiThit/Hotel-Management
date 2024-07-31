<?php

spl_autoload_register('myAutoloader');

function myAutoloader($classname)
{
    $fullPath = 'classes/'. $classname . '.php';

    include_once $fullPath;
}