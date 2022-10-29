<?php

namespace JiraClient\Request;

class SearchRequest {
    private string $jql;
    private int $maxResults = 100;

    /**
     * @return string
     */
    public function getJql(): string
    {
        return $this->jql;
    }

    /**
     * @param string $jql
     */
    public function setJql(string $jql): void
    {
        $this->jql = $jql;
    }

    /**
     * @return int
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * @param int $maxResults
     */
    public function setMaxResults(int $maxResults): void
    {
        $this->maxResults = $maxResults;
    }
}
