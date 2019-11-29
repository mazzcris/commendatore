<?php

namespace App;

require_once __DIR__.'/../vendor/autoload.php';

if (!file_exists('__DIR__.\'/../output')) {
    mkdir('__DIR__.\'/../output', 0777, true);
}

dump('test_1');

var_dump('test_1');

$commenter = new Commenter(__DIR__.'/TestClass.php', __DIR__.'/../output/TestClass.php');
$commenter->commentOnNewFile();
