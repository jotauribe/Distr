<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 18:43
 */

namespace Oriana\Orders\Application\Service\Order;


use Oriana\Orders\Domain\Model\Client\ClientId;
use Oriana\Orders\Domain\Model\Order\Order;
use Oriana\Orders\Domain\Model\Order\OrderId;
use Oriana\Orders\Domain\Model\Order\OrderRepository;
use Oriana\Orders\Domain\Model\Product\Product;
use Oriana\Orders\Domain\Model\Product\ProductId;
use Oriana\Orders\Domain\Model\Product\ProductRepository;

class AddOrderService
{
    private $orderRepository;
    private $productRepository;

    public function __construct(
        OrderRepository $orderRepository,
        ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    public function execute(AddOrderRequest $request = null)
    {
        $order = new Order(
            new OrderId(),
            new ClientId($request->clientId())
        );


        foreach ($request->orderItems() as $orderItem) {
            $product = $this->getProduct($orderItem->productId());
            $order->addItem($product, $orderItem->quantity());
        }

        $this->orderRepository->add($order);
    }

    public function getProduct(string $productId){
        return $this->productRepository->productOfId(new ProductId($productId));
    }
}