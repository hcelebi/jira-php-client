<?php

namespace JiraClient\Dto;

class Sprint
{
    private ?int $id;
    private ?string $name;
    private ?string $state;
    private ?int $boardId;
    private ?string $goal;
    private ?string $startDate;
    private ?string $endDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return int|null
     */
    public function getBoardId(): ?int
    {
        return $this->boardId;
    }

    /**
     * @param int|null $boardId
     */
    public function setBoardId(?int $boardId): void
    {
        $this->boardId = $boardId;
    }

    /**
     * @return string|null
     */
    public function getGoal(): ?string
    {
        return $this->goal;
    }

    /**
     * @param string|null $goal
     */
    public function setGoal(?string $goal): void
    {
        $this->goal = $goal;
    }

    /**
     * @return string|null
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * @param string|null $startDate
     */
    public function setStartDate(?string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string|null
     */
    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    /**
     * @param string|null $endDate
     */
    public function setEndDate(?string $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function toArray() : array
    {
        return get_object_vars($this);
    }

    public function toJson() : string
    {
        return json_encode($this->toArray());
    }
}