<?php
/**
 * Created by PhpStorm.
 * User: Guess
 * Date: 10/6/2017
 * Time: 13:52
 */

namespace Dstr\Domain\Model\Order;


use Dstr\Domain\Model\Client\ClientId;

interface OrderRepository
{
    public function OrderOfId(OrderId $orderId);

    public function OrdersOfClientId(ClientId $clientId);

    public function add(Order $Order);

    public function remove(Order $Order);
}