<?php

namespace Proxies\__CG__\BaseBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CruisePlace extends \BaseBundle\Entity\CruisePlace implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'id', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'placeId', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'title', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'type', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'url', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'searcheable', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'pageable', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'programItems'];
        }

        return ['__isInitialized__', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'id', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'placeId', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'title', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'type', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'url', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'searcheable', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'pageable', '' . "\0" . 'BaseBundle\\Entity\\CruisePlace' . "\0" . 'programItems'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CruisePlace $proxy) {
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
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', [$title]);

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', []);

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl($url)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrl', [$url]);

        return parent::setUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrl', []);

        return parent::getUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setSearcheable($searcheable)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSearcheable', [$searcheable]);

        return parent::setSearcheable($searcheable);
    }

    /**
     * {@inheritDoc}
     */
    public function getSearcheable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSearcheable', []);

        return parent::getSearcheable();
    }

    /**
     * {@inheritDoc}
     */
    public function setPageable($pageable)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPageable', [$pageable]);

        return parent::setPageable($pageable);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPageable', []);

        return parent::getPageable();
    }

    /**
     * {@inheritDoc}
     */
    public function addProgramItem(\BaseBundle\Entity\CruiseCruiseProgramItem $programItems)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProgramItem', [$programItems]);

        return parent::addProgramItem($programItems);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProgramItem(\BaseBundle\Entity\CruiseCruiseProgramItem $programItems)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProgramItem', [$programItems]);

        return parent::removeProgramItem($programItems);
    }

    /**
     * {@inheritDoc}
     */
    public function getProgramItems()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProgramItems', []);

        return parent::getProgramItems();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlaceId($placeId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlaceId', [$placeId]);

        return parent::setPlaceId($placeId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlaceId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlaceId', []);

        return parent::getPlaceId();
    }

}
