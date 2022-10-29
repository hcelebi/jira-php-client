<?php

namespace JiraClient\Service;

use GuzzleHttp\Client;
use JiraClient\Dto\SearchResult;
use JiraClient\Mapper\SearchResultMapper;
use JiraClient\Request\SearchRequest;

class SearchService {
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

    public function search(SearchRequest $searchRequest) : ?SearchResult
    {
        try {
            $response = $this->client->request('GET', 'search?maxResults=' . $searchRequest->getMaxResults() . '&jql=' . urlencode($searchRequest->getJql()));
            $responseData = json_decode($response->getBody()->getContents());
            return SearchResultMapper::map($responseData);
        } catch (\Exception $e) {
            return null;
        }
    }
}