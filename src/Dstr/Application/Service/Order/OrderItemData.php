<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 15:15
 */

namespace Dstr\Application\Service\Order;


class OrderItemData
{
    private $productId;
    private $quantity;

    /**
     * OrderItemData constructor.
     * @param $productId
     * @param $quantity
     */
    public function __construct($productId, $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function productId()
    {
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function quantity()
    {
        return $this->quantity;
    }



}