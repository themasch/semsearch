<?php

declare(strict_types=1);

namespace masch\SemSearch\DI;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\DependencyInjection\AddConsoleCommandPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AppContainerBuilder
{

    public static function build(): ContainerInterface
    {
        $builder = new ContainerBuilder();
        $builder->addCompilerPass(new AddConsoleCommandPass());

        $loader = new YamlFileLoader($builder, new FileLocator(dirname(__DIR__) . '/config'));
        $loader->load('services.yaml');
        $builder->compile(true);

        return $builder;
    }
}
