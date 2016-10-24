<?php

namespace Murich\Phalconkit\TaskTrait;

use RedBeanPHP\R;

trait BeanstalkRedbean
{
    protected static $noJobsSleepInterval = 300;

    /** @var  \Phalcon\Queue\Beanstalk */
    protected $queue;

    protected function haveJobs()
    {
        return (bool) $this->queue->peekReady();
    }

    protected function noJobs()
    {
        R::close();
        sleep(static::$noJobsSleepInterval);
    }

    /**
     * @param \Phalcon\Queue\Beanstalk $queue
     */
    public function setQueue(\Phalcon\Queue\Beanstalk $queue)
    {
        $this->queue = $queue;
    }
}