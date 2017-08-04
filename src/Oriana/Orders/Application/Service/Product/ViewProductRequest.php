<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 20:37
 */

namespace Oriana\Orders\Application\Service\Product;


class ViewProductRequest
{
    private $productId;

    /**
     * ViewProductRequest constructor.
     * @param string $productId
     */
    public function __construct(string $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function productId(): string
    {
        return $this->productId;
    }
}