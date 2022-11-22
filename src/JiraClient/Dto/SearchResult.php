<?php

namespace JiraClient\Dto;

class SearchResult {

    private ?int $startAt;
    private ?int $maxResults;
    private ?int $total;
    /** @var Issue[]  */
    private array $issues = [];

    /**
     * @return int|null
     */
    public function getStartAt(): ?int
    {
        return $this->startAt;
    }

    /**
     * @param int|null $startAt
     */
    public function setStartAt(?int $startAt): void
    {
        $this->startAt = $startAt;
    }

    /**
     * @return int|null
     */
    public function getMaxResults(): ?int
    {
        return $this->maxResults;
    }

    /**
     * @param int|null $maxResults
     */
    public function setMaxResults(?int $maxResults): void
    {
        $this->maxResults = $maxResults;
    }

    /**
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * @param int|null $total
     */
    public function setTotal(?int $total): void
    {
        $this->total = $total;
    }


    /**
     * @return array
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * @param array $issues
     */
    public function setIssues(array $issues): void
    {
        $this->issues = $issues;
    }
    public function toJson() : string
    {
        return json_encode($this->toArray());
    }


    public function toArray() : array
    {
        $issues = [];
        foreach ($this->issues as $issue) {
            $issues[] = $issue->toArray();
        }

        return [
            'startAt' => $this->startAt,
            'maxResults' => $this->maxResults,
            'total' => $this->total,
            'issues' => $issues
        ];
    }
}