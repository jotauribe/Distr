<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 09:27
 */

use Oriana\Orders\Application\Service\Order\AddOrderRequest;
use Oriana\Orders\Application\Service\Product\AddProductRequest;
use Oriana\Orders\Application\Service\Product\ViewProductRequest;
use Oriana\Orders\Infrastructure\Application\Service\Order\AddOrderRequestFactory;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

error_reporting(E_ALL);

require_once __DIR__ . '/../../../../../../../vendor/autoload.php';

Debug::enable();

$app = \Oriana\Orders\Infrastructure\Ui\Web\Silex\Application::bootstrap();

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
     $response =  (array)$app['view_product_application_service']
            ->execute(
                new ViewProductRequest($productId)
             );
     $response = json_encode($response);
     return $response;
})->bind('view-product');

$app->post('/order/add', function (Request $request) use ($app) {
    $app['add_order_application_service']
        ->execute(
            AddOrderRequestFactory::build($request)
        );
    return new Response('<header>Thank you!</header>', 201);
})->bind('add-order');

$app->run();