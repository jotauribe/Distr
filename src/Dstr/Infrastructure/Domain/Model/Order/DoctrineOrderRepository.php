<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 13:51
 */

namespace Dstr\Infrastructure\Domain\Model\Order;


use Doctrine\ORM\EntityRepository;
use Dstr\Domain\Model\Client\ClientId;
use Dstr\Domain\Model\Order\Order;
use Dstr\Domain\Model\Order\OrderId;
use Dstr\Domain\Model\Order\OrderRepository;

class DoctrineOrderRepository extends EntityRepository implements OrderRepository
{

    public function OrderOfId(OrderId $orderId)
    {
        $this.$this->find($orderId);
    }

    public function OrdersOfClientId(ClientId $clientId)
    {
        return $this->findBy(['clientId' => $clientId]);
    }

    public function add(Order $order)
    {
        return $this->getEntityManager()->persist($order);
    }

    public function remove(Order $order)
    {
        return $this->getEntityManager()->remove($order);
    }
}