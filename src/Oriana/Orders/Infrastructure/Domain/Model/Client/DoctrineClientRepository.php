<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 21:09
 */

namespace Oriana\Orders\Infrastructure\Domain\Model\Client;


use Doctrine\ORM\EntityRepository;
use Oriana\Orders\Domain\Model\Client\Client;
use Oriana\Orders\Domain\Model\Client\ClientId;
use Oriana\Orders\Domain\Model\Client\ClientRepository;

class DoctrineClientRepository extends EntityRepository implements ClientRepository
{

    public function clientOfId(ClientId $clientId)
    {
        $this->find($clientId);
    }

    public function clientOfName(string $name)
    {
        $this->findOneBy(["name" => $name]);
    }

    public function add(Client $client)
    {
        $this->getEntityManager()->persist($client);
        $this->getEntityManager()->flush();
    }

    public function remove(Client $client)
    {
        $this->getEntityManager()->remove($client);
        $this->getEntityManager()->flush();
    }
}