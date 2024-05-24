<?php

namespace Container30mO5NH;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KJSb96PService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.KJSb96P' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.KJSb96P'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'book' => ['privates', '.errored..service_locator.KJSb96P.App\\Entity\\Book', NULL, 'Cannot autowire service ".service_locator.KJSb96P": it needs an instance of "App\\Entity\\Book" but this type has been excluded in "config/services.yaml".'],
        ], [
            'book' => 'App\\Entity\\Book',
        ]);
    }
}
