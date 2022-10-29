<?php

namespace JiraClient\Mapper;

use JiraClient\Dto\Fields;
use JiraClient\Dto\Issue;
use JiraClient\Dto\IssueType;

class IssueMapper
{
    public static function map(\stdClass $issueData) : Issue
    {
        $issue = new Issue();
        $issue->setId($issueData->id);
        $issue->setKey($issueData->key);
        $fields = new Fields();

        if (isset($issueData->fields->parent) && $issueData->fields->parent != null) {
            $fields->setParent(IssueMapper::map($issueData->fields->parent));
        }

        if (isset($issueData->fields->labels) && $issueData->fields->labels != null) {
            $fields->setLabels($issueData->fields->labels);
        }

        if (isset($issueData->fields->issuelinks) && $issueData->fields->issuelinks != null) {
            foreach ($issueData->fields->issuelinks as $linkedIssue) {
                if (isset($linkedIssue->inwardIssue)) {
                    $fields->addLink(IssueMapper::map($linkedIssue->inwardIssue));
                }
                if (isset($linkedIssue->outwardIssue)) {
                    $fields->addLink(IssueMapper::map($linkedIssue->outwardIssue));
                }
            }
        }
        $fields->setSummary($issueData->fields->summary);

        $issueType = new IssueType();
        $issueType->setId($issueData->fields->issuetype->id);
        $issueType->setName($issueData->fields->issuetype->name);
        $fields->setIssueType($issueType);

        $issue->setFields($fields);


        return $issue;
    }
}
