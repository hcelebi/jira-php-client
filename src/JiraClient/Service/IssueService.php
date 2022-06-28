<?php

namespace JiraClient\Service;

use GuzzleHttp\Client;
use JiraClient\Dto\Issue;
use JiraClient\Dto\Transition;
use JiraClient\Mapper\IssueMapper;
use JiraClient\Util\JiraKeyUtil;

class IssueService
{
    /** @var Client */
    private $client;

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }



    public function getLinkedAcceptanceTask(string $jiraKey): ?Issue
    {
        $issue = $this->getIssue($jiraKey);
        $links = $issue->getFields()->getLinks();
        if ($links != null && count($links) > 0) {
            return JiraKeyUtil::findWebAcceptanceTaskFromLinks($links);
        }
        return null;
    }


    public function createIssue(array $issue)
    {
        $this->client->request('POST', 'issue', ['body' => json_encode($issue)]);
    }

    public function updateIssueTransition(Issue $issue, Transition $transition) : void
    {
        $data = [
            'transition' => $transition->toArray()
        ];
        $this->client->request('POST', 'issue/' . $issue->getKey() . '/transitions', ['body' => json_encode($data)]);
    }

    public function getIssue(string $key) : ?Issue
    {
        try {
            $response = $this->client->request('GET', 'issue/' . $key);
            $responseData = json_decode($response->getBody()->getContents());
            return IssueMapper::map($responseData);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function updateIssue(string $key, Issue $issue) : void {
        $this->client->request('PUT', 'issue/' . $key, ['body' => $issue->toJson()]);
    }
}