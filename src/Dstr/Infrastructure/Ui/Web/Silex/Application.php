<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 9/6/2017
 * Time: 01:47
 */

namespace Dstr\Infrastructure\Ui\Web\Silex;


use Silex\Provider\DoctrineServiceProvider;

class Application
{
    public static function bootstrap()
    {
        $app = new \Silex\Application();

        $app->register(new DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver' => 'pdo_sqlite',
                'path' => __DIR__.'/../../../../../../db.sqlite'
            )
        ));

        $app['entity_manager'] = function ($app) {
            return (new EntityManagerFactory())->build($app['db']);
        };

        //Repository providers

        $app['order_repository'] = function ($app) {
            return $app['entity_manager']->getRepository('Dstr\Domain\Model\Order\Order');
        };

        $app['product_repository'] = function ($app) {
            return $app['entity_manager']->getRepository('Dstr\Domain\Model\Product\Product');
        };

        $app['client_repository'] = function ($app) {
            return $app['entity_manager']->getRepository('Dstr\Domain\Model\Client\Client');
        };


    }
}