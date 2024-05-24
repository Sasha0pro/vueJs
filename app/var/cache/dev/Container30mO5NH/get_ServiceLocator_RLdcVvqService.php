<?php

namespace Container30mO5NH;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_RLdcVvqService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.rLdcVvq' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.rLdcVvq'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'book' => ['privates', '.errored..service_locator.rLdcVvq.App\\Entity\\Book', NULL, 'Cannot autowire service ".service_locator.rLdcVvq": it needs an instance of "App\\Entity\\Book" but this type has been excluded in "config/services.yaml".'],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'book' => 'App\\Entity\\Book',
            'entityManager' => '?',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]);
    }
}
