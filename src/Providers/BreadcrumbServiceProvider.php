<?php

namespace Groovey\Breadcrumb\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Silex\Api\BootableProviderInterface;
use Groovey\Breadcrumb\Breadcrumb;

class BreadcrumbServiceProvider implements ServiceProviderInterface, BootableProviderInterface
{
    public function register(Container $app)
    {
        $app['breadcrumb'] = function ($app) {

            $path  = $app['breadcrumb.path'];

            $cache = (isset($app['breadcrumb.cache'])) ? $app['breadcrumb.cache'] : '';

            return new Breadcrumb($path, $cache);
        };
    }

    public function boot(Application $app)
    {
    }
}
