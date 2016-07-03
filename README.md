# Breadcrumb

A Silex 2 breadcrumb generator.

## Installation

    $ composer require groovey/breadcrumb

## Usage

```php
 <?php

require_once __DIR__.'/vendor/autoload.php';

use Silex\Application;
use Groovey\Breadcrumb\Providers\BreadcrumbServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new BreadcrumbServiceProvider(), [
        'breadcrumb.path'  => __DIR__.'/templates/breadcrumbs',
        'breadcrumb.cache' => __DIR__.'/cache',
    ]);

$app['breadcrumb']->add('Home', '/home.php', 'home.html');
$app['breadcrumb']->add('Category', '/category.php');
$app['breadcrumb']->add('Edit', '#');

$output = $app['breadcrumb']->render();
```

## Standalone

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Groovey\Breadcrumb\Breadcrumb;

$breadcrumb = new Breadcrumb('./templates/breadcrumbs');

$breadcrumb->add('Home' , '/home.php' , 'home.html');
$breadcrumb->add('Category' , '/category.php');
$breadcrumb->add('Edit' , '#');

print $breadcrumb->render();
```