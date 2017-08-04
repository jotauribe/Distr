<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 17:08
 */

namespace Oriana\Orders\Application\Service\Product;


class AddProductRequest
{
    private $name;
    private $price;

    /**
     * AddProductRequest constructor.
     * @param string $name
     * @param float $price
     */
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function price()
    {
        return $this->price;
    }
}