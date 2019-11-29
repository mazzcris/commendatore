<?php

namespace App;

require_once __DIR__.'/../vendor/autoload.php';

if (!file_exists('__DIR__.\'/../output')) {
    mkdir('__DIR__.\'/../output', 0777, true);
}

dump('test');

var_dump('test');

$commenter = new Commenter(__DIR__.'/TestClass.php', __DIR__.'/../output/TestClass.php');
$commenter->commentOnNewFile();
