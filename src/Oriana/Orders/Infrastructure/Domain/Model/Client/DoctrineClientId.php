<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 9/6/2017
 * Time: 09:36
 */

namespace Oriana\Orders\Infrastructure\Domain\Model\Client;


use Oriana\Orders\Infrastructure\Domain\Model\DoctrineEntityId;

class DoctrineClientId extends DoctrineEntityId
{
    public function getName()
    {
        return 'ClientId';
    }

    protected function getNamespace()
    {
        return 'Dstr\Domain\Model\Client';
    }
}