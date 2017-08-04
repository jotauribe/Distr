<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 13:51
 */

namespace Oriana\Orders\Infrastructure\Domain\Model\Order;


use Doctrine\ORM\EntityRepository;
use Oriana\Orders\Domain\Model\Client\ClientId;
use Oriana\Orders\Domain\Model\Order\Order;
use Oriana\Orders\Domain\Model\Order\OrderId;
use Oriana\Orders\Domain\Model\Order\OrderRepository;

class DoctrineOrderRepository extends EntityRepository implements OrderRepository
{

    public function OrderOfId(OrderId $orderId)
    {
        return $this->find($orderId);
    }

    public function OrdersOfClientId(ClientId $clientId)
    {
        return $this->findOneBy(['clientId' => $clientId]);
    }

    public function add(Order $order)
    {
        $this->getEntityManager()->persist($order);
        $this->getEntityManager()->flush();
    }

    public function remove(Order $order)
    {
        $this->getEntityManager()->remove($order);
        $this->getEntityManager()->flush();
    }
}