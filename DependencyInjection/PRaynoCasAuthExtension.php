<?php

namespace PRayno\CasAuthBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class PRaynoCasAuthExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $authenticator = $container->autowire('prayno.cas_authenticator',
            'PRayno\CasAuthBundle\Security\CasAuthenticator');
        $authenticator->setArguments(array($config));

        $container->register('prayno.cas_user_provider',
            'PRayno\CasAuthBundle\Security\User\CasUserProvider');
    }
}
