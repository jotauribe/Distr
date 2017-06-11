<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 10/6/2017
 * Time: 21:05
 */

namespace Dstr\Domain\Model\Client;


interface ClientRepository
{
    public function clientOfId(ClientId $clientId);

    public function clientOfName(string $name);

    public function add(Client $client);

    public function remove(Client $client);
}