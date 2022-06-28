<?php

namespace JiraClient\Service\Factory;

use Psr\Container\ContainerInterface;
use JiraClient\Factory\JiraClientFactory;
use JiraClient\Service\VersionService;

class VersionServiceFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $versionService = new VersionService();
        $versionService->setClient($container[JiraClientFactory::class]);
        $container[VersionService::class] = $versionService;
    }
}