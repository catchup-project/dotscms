<?php
namespace Core\Application;

use Zend\Mvc\AppContext;
/**
 * Application Context Instance
 * Contains most of the configured information used when running the application.
 */
class Context
{
    /**
     * @var Context
     */
    private static $_instance = null;
    /**
     * @static
     * @return Context
     */
    public static function getInstance()
    {
        if (!static::$_instance){
            static::$_instance = new self();
        }
        return static::$_instance;
    }


    /**
     * @var \Zend\Mvc\AppContext
     */
    private $application = null;
    /**
     * @param \Zend\Mvc\AppContext $application
     */
    public function setApplication(AppContext $application)
    {
        $this->application = $application;
    }
    /**
     * @return \Zend\Mvc\AppContext
     */
    public function getApplication()
    {
        return $this->application;
    }
}