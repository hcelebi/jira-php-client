<?php

namespace JiraClient\Mapper;

use JiraClient\Dto\Assignee;
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

        self::mapParent($issueData, $fields);
        self::mapLabels($issueData, $fields);
        self::mapResolution($issueData, $fields);
        self::mapStatus($issueData, $fields);
        self::mapCustomField10019($issueData, $fields);
        self::mapCustomField10020($issueData, $fields);
        self::mapStoryPoint($issueData, $fields);
        self::mapResolutiondate($issueData, $fields);
        self::mapStatusCategoryChangeDate($issueData, $fields);
        self::mapIssueLinks($issueData, $fields);
        self::mapIssueType($issueData, $fields);
        self::mapAssignee($issueData, $fields);

        $fields->setSummary($issueData->fields->summary);
        $issue->setFields($fields);


        return $issue;
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapParent(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->parent) && $issueData->fields->parent != null) {
            $fields->setParent(IssueMapper::map($issueData->fields->parent));
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapLabels(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->labels) && $issueData->fields->labels != null) {
            $fields->setLabels($issueData->fields->labels);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapResolution(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->resolution) && $issueData->fields->resolution != null) {
            $resolution = new Resolution();
            $resolution->setName($issueData->fields->resolution->name);
            $resolution->setId($issueData->fields->resolution->id);
            $resolution->setDescription($issueData->fields->resolution->description);
            $fields->setResolution($resolution);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapStatus(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->status) && $issueData->fields->status != null) {
            $status = new Status();
            $status->setId($issueData->fields->status->id);
            $status->setName($issueData->fields->status->name);
            $fields->setStatus($status);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapCustomField10019(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->customfield_10019) && $issueData->fields->customfield_10019 != null) {
            $fields->setRankField($issueData->fields->customfield_10019);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     */
    public static function mapCustomField10020(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->customfield_10020) && $issueData->fields->customfield_10020 != null) {
            $sprints = [];
            foreach ($issueData->fields->customfield_10020 as $item) {
                $sprint = new Sprint();
                $sprint->setId($item->id);
                $sprint->setName($item->name);
                $sprint->setBoardId($item->boardId);
                $sprint->setGoal($item->goal);
                $sprint->setEndDate($item->endDate);
                $sprint->setStartDate($item->startDate);
                $sprint->setState($item->state);
                $sprints[$item->id] = $sprint;
            }
            sort($sprints);
            $fields->setSprint($sprints);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapStoryPoint(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->customfield_10032) && $issueData->fields->customfield_10032 != null) {
            $fields->setStoryPoint($issueData->fields->customfield_10032);
        } else if (isset($issueData->fields->customfield_10016) && $issueData->fields->customfield_10016 != null) {
            $fields->setStoryPoint($issueData->fields->customfield_10016);
        } else {
            $fields->setStoryPoint(0);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapResolutiondate(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->resolutiondate) && $issueData->fields->resolutiondate != null) {
            $fields->setResolutiondate($issueData->fields->resolutiondate);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapStatusCategoryChangeDate(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->statuscategorychangedate) && $issueData->fields->statuscategorychangedate != null) {
            $fields->setStatuscategorychangedate($issueData->fields->statuscategorychangedate);
        }
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapIssueLinks(\stdClass $issueData, Fields $fields): void
    {
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
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapIssueType(\stdClass $issueData, Fields $fields): void
    {
        $issueType = new IssueType();
        $issueType->setId($issueData->fields->issuetype->id);
        $issueType->setName($issueData->fields->issuetype->name);
        $fields->setIssueType($issueType);
    }

    /**
     * @param \stdClass $issueData
     * @param Fields $fields
     * @return void
     */
    public static function mapAssignee(\stdClass $issueData, Fields $fields): void
    {
        if (isset($issueData->fields->assignee) && $issueData->fields->assignee != null) {
            $assignee = new Assignee();
            $assignee->setDisplayName($issueData->fields->assignee->displayName);
            $fields->setAssignee($assignee);
        }
    }
}
