<?php

require_once __DIR__.'/vendor/autoload.php';

use Groovey\Breadcrumb\Breadcrumb;

$breadcrumb = new Breadcrumb('./templates/breadcrumbs');

$breadcrumb->add('Home' , '/home.php' , 'home.html');
$breadcrumb->add('Category' , '/category.php');
$breadcrumb->add('Edit' , '#');

print $breadcrumb->render();