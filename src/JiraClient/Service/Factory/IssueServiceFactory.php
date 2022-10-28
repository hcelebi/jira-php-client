<?php

namespace JiraClient\Service\Factory;

use JiraClient\Service\IssueService;

class IssueServiceFactory
{
    public static function getService() : IssueService
    {
        return new IssueService();
    }
}