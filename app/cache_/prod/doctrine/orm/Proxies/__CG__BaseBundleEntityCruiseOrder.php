<?php

namespace Proxies\__CG__\BaseBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CruiseOrder extends \BaseBundle\Entity\CruiseOrder implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'id', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'phone', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'name', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'email', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'comments', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'date', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'shipname', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'shipcode', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'cruisecode', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'startdate', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'enddate', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'cruisedescription'];
        }

        return ['__isInitialized__', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'id', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'phone', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'name', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'email', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'comments', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'date', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'shipname', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'shipcode', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'cruisecode', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'startdate', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'enddate', '' . "\0" . 'BaseBundle\\Entity\\CruiseOrder' . "\0" . 'cruisedescription'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CruiseOrder $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', [$phone]);

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', []);

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setComments($comments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComments', [$comments]);

        return parent::setComments($comments);
    }

    /**
     * {@inheritDoc}
     */
    public function getComments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComments', []);

        return parent::getComments();
    }

    /**
     * {@inheritDoc}
     */
    public function setDate($date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDate', [$date]);

        return parent::setDate($date);
    }

    /**
     * {@inheritDoc}
     */
    public function getDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDate', []);

        return parent::getDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setShipname($shipname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShipname', [$shipname]);

        return parent::setShipname($shipname);
    }

    /**
     * {@inheritDoc}
     */
    public function getShipname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShipname', []);

        return parent::getShipname();
    }

    /**
     * {@inheritDoc}
     */
    public function setShipcode($shipcode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShipcode', [$shipcode]);

        return parent::setShipcode($shipcode);
    }

    /**
     * {@inheritDoc}
     */
    public function getShipcode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShipcode', []);

        return parent::getShipcode();
    }

    /**
     * {@inheritDoc}
     */
    public function setCruisecode($cruisecode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCruisecode', [$cruisecode]);

        return parent::setCruisecode($cruisecode);
    }

    /**
     * {@inheritDoc}
     */
    public function getCruisecode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCruisecode', []);

        return parent::getCruisecode();
    }

    /**
     * {@inheritDoc}
     */
    public function setStartdate($startdate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartdate', [$startdate]);

        return parent::setStartdate($startdate);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartdate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartdate', []);

        return parent::getStartdate();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnddate($enddate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnddate', [$enddate]);

        return parent::setEnddate($enddate);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnddate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnddate', []);

        return parent::getEnddate();
    }

    /**
     * {@inheritDoc}
     */
    public function setCruisedescription($cruisedescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCruisedescription', [$cruisedescription]);

        return parent::setCruisedescription($cruisedescription);
    }

    /**
     * {@inheritDoc}
     */
    public function getCruisedescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCruisedescription', []);

        return parent::getCruisedescription();
    }

}