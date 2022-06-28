<?php

namespace JiraClient\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use JiraClient\Dto\Fields;
use JiraClient\Dto\Issue;
use JiraClient\Dto\Version;
use JiraClient\Mapper\IssueMapper;
use JiraClient\Mapper\VersionMapper;

class VersionService
{
    /** @var Client */
    private $client;

    /**
     * @param int $projectId
     * @return Version[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVersionsByProjectId(int $projectId) : array
    {
        $response = $this->client->request('GET', 'project/' . $projectId . '/versions' );
        $responseDataList = json_decode($response->getBody()->getContents());
        $versions = [];
        foreach ($responseDataList as $responseData) {
            $versions[] = VersionMapper::map($responseData);
        }
        return $versions;
    }

    /**
     * @param int $versionId
     * @return Version
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVersion(int $versionId) : Version
    {
        $response = $this->client->request('GET', 'version/' . $versionId);
        $responseData = json_decode($response->getBody()->getContents());
        return VersionMapper::map($responseData);
    }

    /**
     * @param Version $version
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(Version $version)
    {
        $this->client->request('PUT', 'version/' . $version->getId(), ['body' => $version->toJson()]);
    }

    /**
     * @param Version $version
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(Version $version)
    {
        $this->client->request('POST', 'version', ['body' => $version->toJson()]);
    }

    /**
     * @param int $versionId
     * @return Issue[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRelatedIssues(int $versionId) : array
    {
        $response = $this->client->request('GET', 'search?jql=fixVersion=' . $versionId);
        $responseData = json_decode($response->getBody()->getContents());
        $issues = [];
        foreach ($responseData->issues as $issueData) {
            $issues[] = IssueMapper::map($issueData);
        }
        return $issues;
    }


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
}