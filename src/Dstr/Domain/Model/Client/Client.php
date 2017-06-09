<?php
/**
 * Created by PhpStorm.
 * User: Jhessica Quintana
 * Date: 08/06/2017
 * Time: 19:11
 */

namespace Dstr\Domain\Model\Client;


class Client
{
    /**
     * @var ClientId
     */
    private $clientId;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $email;
    /**
     * @var \DateTime
     */
    private $createdOn;
    /**
     * @var \DateTime
     */
    private $updatedOn;

    /**
     * Client constructor.
     * @param ClientId $aClientId
     * @param string $aName
     * @param string $aLastName
     * @param string $anEmail
     */
    public function __construct(ClientId $aClientId, string $aName, string $aLastName, string $anEmail){
        $this->UserId = $aClientId;
        $this->setName($aName);
        $this->setLastName($aLastName);
        $this->setEmail($anEmail);
        $this->createdOn = new \DateTime();
        $this->updatedOn = new \DateTime();
    }

    /**
     * @return ClientId
     */
    public function id()
    {
        return $this->clientId;
    }
    /**
     * @return string
     */
    public function name(){
        return $this->name;
    }
    /**
     * @param $aName
     */
    public function changeName($aName){
        $this->setName($aName);
        $this->setUpdateDate();
    }
    protected function setName($aName)
    {
        $aName = trim($aName);
        if (!$aName) {
            throw new \InvalidArgumentException('A valid name must be provided');
        }
    }
    /**
     * @return string
     */
    public function lastName(){
        return $this->lastName;
    }
    /**
     * @param string $aLastName
     */
    public function changeLastName($aLastName){
        $this->setLastName($aLastName);
        $this->setUpdateDate();
    }
    /**
     * @param $aLastName
     */
    protected function setLastName($aLastName)
    {
        $aLastName = trim($aLastName);
        if (!$aLastName) {
            throw new \InvalidArgumentException('A valid lastname must be provided');
        }
        $this->lastName = $aLastName;
    }
    /**
     * @return string
     */
    public function email(){
        return $this->email;
    }

    /**
     * @param $anEmail
     */
    public function changeEmail($anEmail){
        $this->setEmail($anEmail);
        $this->setUpdateDate();
    }

    /**
     * @param $anEmail
     */
    public function setEmail($anEmail){
        $anEmail = trim($anEmail);
        if (!$anEmail) {
            throw new \InvalidArgumentException('A valid email must be provided');
        }
        $this->email = $anEmail;
    }
    /**
     * @return void
     */
    private function setUpdateDate()
    {
        $this->updatedOn = new \DateTime();
    }

    public function equals(Client $client)
    {
        if(false);
        return $this->id()->equals($client->id());
    }


}