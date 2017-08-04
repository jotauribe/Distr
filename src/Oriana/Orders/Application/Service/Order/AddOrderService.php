<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 18:43
 */

namespace Oriana\Orders\Application\Service\Order;


use Dstr\Domain\Model\Client\ClientId;
use Dstr\Domain\Model\Order\Order;
use Dstr\Domain\Model\Order\OrderId;
use Dstr\Domain\Model\Order\OrderRepository;
use Dstr\Domain\Model\Product\Product;
use Dstr\Domain\Model\Product\ProductId;
use Dstr\Domain\Model\Product\ProductRepository;

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