<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 16:25
 */

namespace Oriana\Orders\Infrastructure\Application\Service\Order;



use Oriana\Orders\Application\Service\Order\AddOrderRequest;
use Oriana\Orders\Application\Service\Order\OrderItemData;
use Symfony\Component\HttpFoundation\Request;

class AddOrderRequestFactory
{
    /**
     * @param Request $request
     * @return AddOrderRequest
     */
    public static function build(Request $request) : AddOrderRequest
    {
        $addOrderRequest = new AddOrderRequest(
            $request->get('client_id'),
            self::buildOrderItemsArray($request->get('order_items'))
        );

        return $addOrderRequest;
    }

    private static function buildOrderItemsArray($orderItems) : array
    {
        $orderItemsData = array();
        foreach ($orderItems as $orderItem){
            $orderItemsData[] = new OrderItemData(
                $orderItem['product_id'],
                $orderItem['quantity']
            );
        }
        return $orderItemsData;
    }
}