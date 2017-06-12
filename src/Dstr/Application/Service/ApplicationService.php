<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 00:31
 */

namespace Dstr\Application\Service;

/**
 * Interface ApplicationService
 * @package Dstr\Application\Service
 */
interface ApplicationService
{
    /**
     * @param null $request
     * @return mixed
     */
    public function execute($request = null);
}