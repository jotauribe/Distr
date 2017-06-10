<?php
/**
 * Created by PhpStorm.
 * User: Jhessica Quintana
 * Date: 08/06/2017
 * Time: 19:30
 */

namespace Dstr\Domain\Model\Order;


use Dstr\Domain\Model\Product\Product;

class OrderItem
{
    /**
     * @var int
     */
    private $id;

    /**
     *
     * @var Product
     */
    private $product;

    /**
     * @var double
     */
    private $quantity;

    /**
     * @var double
     */
    private $total;

    /**
     * OrderItem constructor.
     * @param $product
     * @param $quantity
     */
    public function __construct($product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function product()
    {
        return $this->product;
    }

    /**
     * @return float
     */
    public function quantity()
    {
        return $this->quantity;
    }

    /**
     * @param $quantity
     */
    public function changeQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function total()
    {
        return $this->total;
    }

    /**
     * @param $total
     */
    public function calculateTotal($total)
    {
        $this->total = $total;
    }
}