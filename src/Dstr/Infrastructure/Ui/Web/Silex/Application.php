<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 9/6/2017
 * Time: 01:47
 */

namespace Dstr\Infrastructure\Ui\Web\Silex;


use Dstr\Application\Service\Order\AddOrderService;
use Dstr\Application\Service\Product\AddProductService;
use Dstr\Application\Service\Product\ViewProductService;
use Dstr\Infrastructure\Persistence\Doctrine\EntityManagerFactory;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

class Application
{
    public static function bootstrap()
    {
        $app = new \Silex\Application();

        $app['debug'] = true;

        // WEB PROFILER SERVICE PROVIDER

        $app->register(new HttpFragmentServiceProvider());
        $app->register(new ServiceControllerServiceProvider());
        $app->register(new TwigServiceProvider());

        $app->register(new WebProfilerServiceProvider(), array(
            'profiler.cache_dir' => __DIR__.'/../cache/profiler',
            'profiler.mount_prefix' => '/_profiler', // this is the default
        ));

        $app['entity_manager'] = function ($app) {
            return (new EntityManagerFactory())->build($app['db']);
        };

        //DOCTRINE SERVICE PROVIDER

        $app->register(new DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'port' => '3306',
                'dbname' => 'dstr_orders',
                'user' => 'root',
                'password' => ''
            )
        ));

        //REPOSITORIES

        $app['order_repository'] = function ($app) {
            return $app['entity_manager']->getRepository('Dstr\Domain\Model\Order\Order');
        };

        $app['product_repository'] = function ($app) {
            return $app['entity_manager']->getRepository('Dstr\Domain\Model\Product\Product');
        };

        $app['client_repository'] = function ($app) {
            return $app['entity_manager']->getRepository('Dstr\Domain\Model\Client\Client');
        };

        //APPLICATION SERVICES

        $app['add_product_application_service'] = function ($app) {
            return new AddProductService(
                $app['product_repository']
            );
        };

        $app['view_product_application_service'] = function ($app) {
            return new ViewProductService(
                $app['product_repository']
            );
        };

        $app['add_order_application_service'] = function ($app) {
            return new AddOrderService(
                $app['order_repository'],
                $app['product_repository']
            );
        };


        return $app;
    }
}