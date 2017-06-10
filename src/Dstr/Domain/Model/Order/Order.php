<?php
/**
 * Created by PhpStorm.
 * User: Jhessica Quintana
 * Date: 08/06/2017
 * Time: 19:15
 */

namespace Dstr\Domain\Model\Order;


use Doctrine\Common\Collections\ArrayCollection;
use Dstr\Domain\Model\Client\ClientId;

class Order
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var ClientId
     */
    private $clientId;

    /**
     * @var OrderItem
     */
    private $orderItems;

    /**
     * @var double
     */
    private $total;

    /**
     * Order constructor.
     * @param Sring $id
     * @param \DateTime $date
     * @param Client $client
     */
    public function __construct(Sring $id, \DateTime $date, ClientId $clientId)
    {
        $this->date = new \DateTime();
        $this->orderItems = new ArrayCollection();
        $this->id = $id;
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function date(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return Client
     */
    public function clientId(): ClientId
    {
        return $this->clientId;
    }

    /**
     * @return array
     */
    public function orderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @return float
     */
    public function total(): float
    {
        return $this->total;
    }


}