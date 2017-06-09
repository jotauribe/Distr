<?php
/**
 * Created by PhpStorm.
 * User: Jota Uribe
 * Date: 9/6/2017
 * Time: 01:47
 */

namespace Dstr\Infrastructure\Ui\Web\Silex;


use Silex\Provider\DoctrineServiceProvider;

class Application
{
    public static function bootstrap()
    {
        $app = new \Silex\Application();

        $app->register(new DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver' => 'pdo_mysql',
                'host' => 'localhost:3306',
                'dbname' => 'dstr_database',
                'user' => 'root',
                'password' => ''
            )
        ));
    }
}