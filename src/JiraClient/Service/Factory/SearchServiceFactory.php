<?php

namespace JiraClient\Service\Factory;

use JiraClient\Service\SearchService;

class SearchServiceFactory
{
    public static function getService() : SearchService
    {
        return new SearchService();
    }
}