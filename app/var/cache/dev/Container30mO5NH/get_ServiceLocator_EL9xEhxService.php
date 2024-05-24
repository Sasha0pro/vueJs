<?php

namespace Container30mO5NH;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_EL9xEhxService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.eL9xEhx' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.eL9xEhx'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'config' => ['privates', 'App\\Service\\config', 'getConfigService', true],
            'managerRegistry' => ['services', 'doctrine', 'getDoctrineService', false],
            'passwordHasher' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
            'requestBodyDTO' => ['privates', 'App\\DTO\\TestRequestBodyDTO', 'getTestRequestBodyDTOService', true],
        ], [
            'config' => 'App\\Service\\config',
            'managerRegistry' => '?',
            'passwordHasher' => '?',
            'requestBodyDTO' => 'App\\DTO\\TestRequestBodyDTO',
        ]);
    }
}
