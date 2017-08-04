<?php
/**
 * Created by PhpStorm.
 * User: Guess
 * Date: 10/6/2017
 * Time: 10:41
 */

namespace Oriana\Orders\Infrastructure\Domain\Model\Order;


use Oriana\Orders\Infrastructure\Domain\Model\DoctrineEntityId;

class DoctrineOrderId extends DoctrineEntityId
{
    public function getName()
    {
        return 'OrderId';
    }

    protected function getNamespace()
    {
        return 'Dstr\Domain\Model\Order';
    }
}