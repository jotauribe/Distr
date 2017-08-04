<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 8/6/2017
 * Time: 22:59
 */

namespace Oriana\Orders\Domain\Model\Product;


use Dstr\Domain\Model\Order\OrderId;
use Ramsey\Uuid\Uuid;

class ProductId
{
    /**
     * @var string
     */
    private $id;

    /**
     * ProductId constructor.
     * @param string|null $id
     */
    public function __construct(string $id = null)
    {
        $this->id = $id === null ? Uuid::uuid4()->toString(): $id;
    }

    /**
     * @return null|string
     */
    public function asString()
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param ProductId $productId
     * @return bool
     */
    public function equals(ProductId $productId)
    {
        return $this->id() === $productId->id();
    }

    /**
     * @return null|string
     */
    public function __toString()
    {
        return $this->id;
    }
}