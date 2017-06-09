<?php
/**
 * Created by PhpStorm.
 * User: Guess
 * Date: 9/6/2017
 * Time: 09:35
 */

namespace Dstr\Infrastructure\Persistence\Doctrine;


class EntityManagerFactory
{
    /**
     * @return EntityManager
     */
    public function build($conn)
    {
        //\Doctrine\DBAL\Types\Type::addType('UserId', 'Lw\Infrastructure\Domain\Model\User\DoctrineUserId');
        //\Doctrine\DBAL\Types\Type::addType('WishId', 'Lw\Infrastructure\Domain\Model\Wish\DoctrineWishId');
        return EntityManager::create(
            $conn,
            Setup::createYAMLMetadataConfiguration([__DIR__ . '/Mapping'], true)
        );
    }
}