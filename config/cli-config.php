<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 11/6/2017
 * Time: 18:58
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__.'/../vendor/autoload.php';

return ConsoleRunner::createHelperSet(
    (new Dstr\Infrastructure\Ui\Web\Silex\Application())->bootstrap()['entity_manager']
);