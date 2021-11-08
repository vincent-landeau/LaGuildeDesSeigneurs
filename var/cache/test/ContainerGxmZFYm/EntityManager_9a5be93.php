<?php

namespace ContainerGxmZFYm;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder71188 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerbbd4e = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesa9c05 = [
        
    ];

    public function getConnection()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getConnection', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getMetadataFactory', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getExpressionBuilder', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'beginTransaction', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getCache', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getCache();
    }

    public function transactional($func)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'transactional', array('func' => $func), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'wrapInTransaction', array('func' => $func), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'commit', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->commit();
    }

    public function rollback()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'rollback', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getClassMetadata', array('className' => $className), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'createQuery', array('dql' => $dql), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'createNamedQuery', array('name' => $name), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'createQueryBuilder', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'flush', array('entity' => $entity), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'clear', array('entityName' => $entityName), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->clear($entityName);
    }

    public function close()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'close', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->close();
    }

    public function persist($entity)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'persist', array('entity' => $entity), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'remove', array('entity' => $entity), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'refresh', array('entity' => $entity), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'detach', array('entity' => $entity), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'merge', array('entity' => $entity), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getRepository', array('entityName' => $entityName), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'contains', array('entity' => $entity), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getEventManager', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getConfiguration', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'isOpen', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getUnitOfWork', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getProxyFactory', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'initializeObject', array('obj' => $obj), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'getFilters', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'isFiltersStateClean', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'hasFilters', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return $this->valueHolder71188->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerbbd4e = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder71188) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder71188 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder71188->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, '__get', ['name' => $name], $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        if (isset(self::$publicPropertiesa9c05[$name])) {
            return $this->valueHolder71188->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder71188;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder71188;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder71188;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder71188;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, '__isset', array('name' => $name), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder71188;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder71188;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, '__unset', array('name' => $name), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder71188;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder71188;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, '__clone', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        $this->valueHolder71188 = clone $this->valueHolder71188;
    }

    public function __sleep()
    {
        $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, '__sleep', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;

        return array('valueHolder71188');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerbbd4e = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerbbd4e;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerbbd4e && ($this->initializerbbd4e->__invoke($valueHolder71188, $this, 'initializeProxy', array(), $this->initializerbbd4e) || 1) && $this->valueHolder71188 = $valueHolder71188;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder71188;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder71188;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
