<?php

use Silex\Application;
use Groovey\Breadcrumb\Providers\BreadcrumbServiceProvider;

class BreadcrumbTest extends PHPUnit_Framework_TestCase
{
    private function init()
    {
        $app = new Application();
        $app['debug'] = true;

        $app->register(new BreadcrumbServiceProvider(), [
                'breadcrumb.path'  => __DIR__.'/../templates/breadcrumbs',
                'breadcrumb.cache' => __DIR__.'/../cache',
            ]);

        return $app;
    }

    public function testBreadcrumb()
    {
        $app = $this->init();

        $app['breadcrumb']->add('Home', '/home.php', 'home.html');
        $app['breadcrumb']->add('Category', '/category.php');
        $app['breadcrumb']->add('Edit', '#');

        $output = $app['breadcrumb']->render();

        $this->assertRegExp('/Home/', $output);
    }
}
