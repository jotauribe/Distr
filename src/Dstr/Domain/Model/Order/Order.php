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
use Dstr\Domain\Model\Product\Product;
use Dstr\Domain\Model\Product\ProductId;

class Order
{
    /**
     * @var OrderId
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
     * @var array
     */
    private $orderItems;

    /**
     * @var double
     */
    private $total;

    /**
     * @var int
     */
    private $next_id;

    /**
     * Order constructor.
     * @param OrderId|Sring $id
     * @param ClientId $clientId
     * @internal param \DateTime $date
     * @internal param Client $client
     */
    public function __construct(OrderId $id, ClientId $clientId)
    {
        $this->date = new \DateTime();
        $this->orderItems = new ArrayCollection();
        $this->next_id = 0;
        $this->total = 0;
        $this->id = $id;
        $this->clientId = $clientId;
    }

    public function addItem(Product $product, int $quantity)
    {
        $id = $this->nextId();
        $this->orderItems->add(new OrderItem($id, $product, $quantity));
        $this->total = $this->total + ($product->price() * $quantity);

    }

    private function nextId()
    {
        $id = $this->next_id;
        $this->updateNextId();
        return $id;
    }

    private function updateNextId()
    {
        $this->next_id++;
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
        return $this->orderItems->toArray();
    }

    /**
     * @return float
     */
    public function total(): float
    {
        return $this->total;
    }


}