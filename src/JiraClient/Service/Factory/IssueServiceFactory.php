<?php

namespace JiraClient\Service\Factory;

use Psr\Container\ContainerInterface;
use JiraClient\Factory\JiraClientFactory;
use JiraClient\Service\IssueService;

class IssueServiceFactory
{
    public static function getService() : IssueService
    {
        return new IssueService();
    }
}