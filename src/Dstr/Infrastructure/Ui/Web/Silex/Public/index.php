<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 09:27
 */

use Dstr\Application\Service\Order\AddOrderRequest;
use Dstr\Application\Service\Product\AddProductRequest;
use Dstr\Application\Service\Product\ViewProductRequest;
use Dstr\Infrastructure\Application\Service\Order\AddOrderRequestFactory;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

error_reporting(E_ALL);

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

Debug::enable();

$app = \Dstr\Infrastructure\Ui\Web\Silex\Application::bootstrap();

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
    return "OK";
});

$app->get('/', function () use ($app) {
    return 'Welcome to home';
})->bind('home');

$app->post('/product/add', function (Request $request) use ($app) {
    $app['add_product_application_service']
        ->execute(
            new AddProductRequest(
                $request->get('product_name'),
                $request->get('product_price')
            )
        );
    return 'Welcome to home';
})->bind('add-product');

$app->get('/product/{productId}', function ($productId) use ($app) {
     $app['view_product_application_service']
        ->execute(
            new ViewProductRequest($productId)
        );
     return "OK";
})->bind('view_product');

$app->post('/order/add', function (Request $request) use ($app) {
    $app['add_order_application_service']
        ->execute(
            AddOrderRequestFactory::build($request)
        );
    return "OK";
})->bind('add-order');

$app->run();