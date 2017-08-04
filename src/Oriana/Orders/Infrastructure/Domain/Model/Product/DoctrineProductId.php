<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 14:36
 */

namespace Oriana\Orders\Infrastructure\Domain\Model\Product;


use Oriana\Orders\Infrastructure\Domain\Model\DoctrineEntityId;

class DoctrineProductId extends DoctrineEntityId
{
    public function getName()
    {
        return 'ProductId';
    }

    protected function getNamespace()
    {
        return 'Dstr\Domain\Model\Product';
    }
}