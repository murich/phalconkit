<?php

namespace Murich\Phalconkit\TaskTrait;


trait BeanstalkRedbean
{
    protected static $noJobsSleepInterval = 300;

    /** @var  Phalcon\Queue\Beanstalk */
    protected $queue;

    /** @var  \Murich\Phalconkit\Model\RedbeanInit */
    protected $redbeanInit;

    protected function haveJobs()
    {
        return (bool) $this->queue->peekReady();
    }

    protected function noJobs()
    {
        $this->redbeanInit->close();
        sleep(static::$noJobsSleepInterval);
    }

    /**
     * @param \Phalcon\Queue\Beanstalk $queue
     */
    public function setQueue(\Phalcon\Queue\Beanstalk $queue)
    {
        $this->queue = $queue;
    }

    /**
     * @param \Murich\Phalconkit\Model\RedbeanInit $redbeanInit
     */
    public function setRedbeanInit($redbeanInit)
    {
        $this->redbeanInit = $redbeanInit;
    }
}