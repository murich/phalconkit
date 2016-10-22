<?php

namespace Murich\Phalconkit\Model;

use RedBeanPHP\R;

class RedbeanInit
{
    /** @var  array */
    protected $dbConfig;

    public function __construct($config)
    {
        $this->dbConfig = $config->database->toArray();
    }

    public function connect()
    {
        /**
         * @todo: abstract factory could be implemented based on db server type
         * @todo: exception could be implemented in case dbConfig doesn't have required keys
         */
        R::setup(
            'mysql:host='. $this->dbConfig['host'] .';dbname='. $this->dbConfig['dbname'],
            $this->dbConfig['username'],
            $this->dbConfig['password']
        );
    }

    public function close()
    {
        R::close();
    }
}