<?php
/**
 * Created by PhpStorm.
 * User: Jota Quintana
 * Date: 08/06/2017
 * Time: 20:53
 */

namespace Dstr\Domain\Model\Order;


use Ramsey\Uuid\Uuid;

class OrderId
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
        $this->id = $id === null ? Uuid::uuid4()->toString() : $id;
    }

    /**
     * @return null|string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function asString()
    {
        return $this->id;
    }

    /**
     * @param OrderId $orderId
     * @return bool
     * @internal param ProductId $productId
     */
    public function equals(OrderId $orderId)
    {
        return $this->id() === $orderId->id();
    }

    /**
     * @return null|string
     */
    public function __toString()
    {
        return $this->id;
    }
}