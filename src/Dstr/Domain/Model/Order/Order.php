<?php
/**
 * Created by PhpStorm.
 * User: Jhessica Quintana
 * Date: 08/06/2017
 * Time: 19:15
 */

namespace Dstr\Domain\Model\Order;


use Dstr\Domain\Model\Client\Client;

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
     * @var Client
     */
    private $client;

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
    public function __construct(Sring $id, \DateTime $date, Client $client)
    {
        $this->date = new \DateTime();
        $this->orderItems = array();
        $this->id = $id;
        $this->client = $client;
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
    public function client(): Client
    {
        return $this->client;
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