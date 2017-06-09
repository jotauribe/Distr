<?php
/**
 * Created by PhpStorm.
 * User: Guess
 * Date: 9/6/2017
 * Time: 09:36
 */

namespace Dstr\Infrastructure\Domain\Model\Client;


use Dstr\Domain\Model\Client\ClientId;

class DoctrineClientId extends ClientId
{
    public function __construct($id = null)
    {
        parent::__construct($id);
    }
}