<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 14:36
 */

namespace Dstr\Infrastructure\Domain\Model\Product;


use Dstr\Infrastructure\Domain\Model\DoctrineEntityId;

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