<?php

namespace JiraClient\Dto;

class SearchResult {

    private ?int $startAt;
    private ?int $maxResult;
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
    public function getMaxResult(): ?int
    {
        return $this->maxResult;
    }

    /**
     * @param int|null $maxResult
     */
    public function setMaxResult(?int $maxResult): void
    {
        $this->maxResult = $maxResult;
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
            'maxResult' => $this->maxResult,
            'total' => $this->total,
            'issues' => $issues
        ];
    }
}