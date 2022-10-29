<?php

namespace JiraClient\Mapper;

use JiraClient\Dto\SearchResult;

class SearchResultMapper
{
    public static function map(\stdClass $issueData) : SearchResult {
        var_dump($issueData);
        return new SearchResult();
    }
}