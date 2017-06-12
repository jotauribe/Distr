<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 22:58
 */

namespace Dstr\Domain\Model\Order;

use Dstr\Domain\Model\Client\ClientId;
use Dstr\Domain\Model\Product\Product;
use Dstr\Domain\Model\Product\ProductId;

/**
 * Class OrderTest
 * @package Dstr\Domain\Model\Order
 * @covers Order
 */
class OrderTest extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $order = new Order(new OrderId("0bda8046-4587-4152-84b8-9c8780aa4238"), new ClientId());
        $product1 =  new Product(new ProductId("0bda8046-4587-4152-84b8-9c8780aa4231"), "product 1", 23000);
        $product2 =  new Product(new ProductId("0bda8046-4587-4152-84b8-9c8780aa4232"), "product 2", 23000);
        $order->addItem($product1, 23);
        $order->addItem($product2, 25);
        $order->addItem($product1, 23);
        $order->addItem($product2, 23);

        $this->assertFalse($order->checkIdentities(0));
    }
}
