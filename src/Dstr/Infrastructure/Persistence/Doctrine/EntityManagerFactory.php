<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 9/6/2017
 * Time: 09:35
 */

namespace Dstr\Infrastructure\Persistence\Doctrine;


use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManager
     */
    public function build($conn)
    {
        Type::addType('OrderId', 'Dstr\Infrastructure\Domain\Model\Order\DoctrineOrderId');
        Type::addType('ProductId', 'Dstr\Infrastructure\Domain\Model\Product\DoctrineProductId');
        Type::addType('ClientId', 'Dstr\Infrastructure\Domain\Model\Client\DoctrineClientId');
        return EntityManager::create(
            $conn,
            Setup::createYAMLMetadataConfiguration([__DIR__ . '/Mapping'], true)
        );
    }
}