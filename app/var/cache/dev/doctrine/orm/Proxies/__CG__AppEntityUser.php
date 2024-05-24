<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\InternalProxy
{
    use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as __load;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'books' => [parent::class, 'books', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'password' => [parent::class, 'password', null],
        "\0".parent::class."\0".'roles' => [parent::class, 'roles', null],
        "\0".parent::class."\0".'tokens' => [parent::class, 'tokens', null],
        "\0".parent::class."\0".'username' => [parent::class, 'username', null],
        'books' => [parent::class, 'books', null],
        'id' => [parent::class, 'id', null],
        'password' => [parent::class, 'password', null],
        'roles' => [parent::class, 'roles', null],
        'tokens' => [parent::class, 'tokens', null],
        'username' => [parent::class, 'username', null],
    ];

    public function __isInitialized(): bool
    {
        return isset($this->lazyObjectState) && $this->isLazyObjectInitialized();
    }

    public function __serialize(): array
    {
        $properties = (array) $this;
        unset($properties["\0" . self::class . "\0lazyObjectState"]);

        return $properties;
    }
}
