<?php

namespace JiraClient\Mapper;

use JiraClient\Dto\SearchResult;

class SearchResultMapper
{
    public static function map(\stdClass $response) : SearchResult {
        $searchResult = new SearchResult();
        $searchResult->setMaxResult($response->maxResult);
        $searchResult->setStartAt($response->startAt);
        $searchResult->setTotal($response->total);
        $issues = [];
        foreach ($response->issues as $issueResponse) {
            $issues[] = IssueMapper::map($issueResponse);
        }
        $searchResult->setIssues($issues);
        return $searchResult;
    }
}