<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 00:50
 */

namespace Oriana\Orders\Application\Service\Order;


class AddOrderRequest
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var array
     */
    private $orderItems;

    /**
     * AddOrderRequest constructor.
     * @param string $clientId
     * @param array $orderItems
     */
    public function __construct(string $clientId, array $orderItems)
    {
        $this->clientId = $clientId;
        $this->orderItems = $orderItems;
    }

    /**
     * @return string
     */
    public function clientId()
    {
        return $this->clientId;
    }

    /**
     * @return array
     */
    public function orderItems()
    {
        return $this->orderItems;
    }

}