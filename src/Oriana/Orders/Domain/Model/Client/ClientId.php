<?php
/**
 * Created by PhpStorm.
 * User: Guess
 * Date: 8/6/2017
 * Time: 23:38
 */

namespace Oriana\Orders\Domain\Model\Client;


use Ramsey\Uuid\Uuid;

class ClientId
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
     * @param ClientId $clientId
     * @return bool
     * @internal param ProductId $productId
     */
    public function equals(ClientId $clientId)
    {
        return $this->id() === $clientId->id();
    }

    /**
     * @return null|string
     */
    public function __toString()
    {
        return $this->id;
    }
}