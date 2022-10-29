<?php

namespace JiraClient\Request;

class SearchRequest {
    private string $jql;
    private int $maxResults = 100;
    private int $startAt = 0;

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

    /**
     * @return int
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }

    /**
     * @param int $startAt
     */
    public function setStartAt(int $startAt): void
    {
        $this->startAt = $startAt;
    }
}
