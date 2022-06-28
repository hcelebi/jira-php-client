<?php

namespace JiraClient\Service\Factory;

use Psr\Container\ContainerInterface;
use JiraClient\Factory\JiraClientFactory;
use JiraClient\Service\IssueService;

class IssueServiceFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $issueService = new IssueService();
        $issueService->setClient($container[JiraClientFactory::class]);
        $container[IssueService::class] = $issueService;
    }
}