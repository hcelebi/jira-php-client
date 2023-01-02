<?php

namespace JiraClient\Mapper;

use JiraClient\Dto\Fields;
use JiraClient\Dto\Issue;
use JiraClient\Dto\IssueType;
use JiraClient\Dto\Resolution;
use JiraClient\Dto\Sprint;
use JiraClient\Dto\Status;

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

        if (isset($issueData->fields->resolution) && $issueData->fields->resolution != null) {
            $resolution = new Resolution();
            $resolution->setName($issueData->fields->resolution->name);
            $resolution->setId($issueData->fields->resolution->id);
            $resolution->setDescription($issueData->fields->resolution->description);
            $fields->setResolution($resolution);
        }

        if (isset($issueData->fields->status) && $issueData->fields->status != null) {
            $status = new Status();
            $status->setId($issueData->fields->status->id);
            $status->setName($issueData->fields->status->name);
            $fields->setStatus($status);
        }
        if (isset($issueData->fields->customfield_10019) && $issueData->fields->customfield_10019 != null) {
            $fields->setRankField($issueData->fields->customfield_10019);
        }

        if (isset($issueData->fields->customfield_10020) && $issueData->fields->customfield_10020 != null && isset($issueData->fields->customfield_10020[0])) {
            $sprint = new Sprint();
            $sprint->setId($issueData->fields->customfield_10020[0]->id);
            $sprint->setName($issueData->fields->customfield_10020[0]->name);
            $sprint->setBoardId($issueData->fields->customfield_10020[0]->boardId);
            $sprint->setGoal($issueData->fields->customfield_10020[0]->goal);
            $sprint->setEndDate($issueData->fields->customfield_10020[0]->endDate);
            $sprint->setStartDate($issueData->fields->customfield_10020[0]->startDate);
            $sprint->setState($issueData->fields->customfield_10020[0]->state);
            $fields->setSprint($sprint);
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
