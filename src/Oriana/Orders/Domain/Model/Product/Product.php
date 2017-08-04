<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 08/06/2017
 * Time: 19:15
 */

namespace Oriana\Orders\Domain\Model\Product;


class Product
{
    /**
     * @var ProductId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var double
     */
    private $price;

    /**
     * Product constructor.
     * @param ProductId $id
     * @param string $name
     * @param float $price
     */
    public function __construct(ProductId $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return ProductId
     */
    public function id(): ProductId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function changeName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function price(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function changePrice(float $price)
    {
        $this->price = $price;
    }




}