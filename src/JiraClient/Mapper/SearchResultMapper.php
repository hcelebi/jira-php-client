<?php

namespace JiraClient\Mapper;

use JiraClient\Dto\SearchResult;

class SearchResultMapper
{
    public static function map(\stdClass $issueData) : SearchResult {
        $searchResult = new SearchResult();
        $searchResult->setMaxResult($issueData->maxResult);
        $searchResult->setStartAt($issueData->startAt);
        $searchResult->setTotal($issueData->total);
        $issues = [];
        foreach ($issueData as $issueDatum) {
            $issues[] = IssueMapper::map($issueDatum);
        }
        $searchResult->setIssues($issues);
        return $searchResult;
    }
}