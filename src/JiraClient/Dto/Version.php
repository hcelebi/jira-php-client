<?php

namespace JiraClient\Dto;

class Version
{
    /** @var int */
    private $id;
    /** @var string */
    private $description;
    /** @var string */
    private $name;
    /** @var bool */
    private $released;
    /** @var string|null */
    private $releaseDate;
    /** @var int */
    private $projectId;
    /** @var bool */
    private $archived;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isReleased(): bool
    {
        return $this->released;
    }

    /**
     * @param bool $released
     */
    public function setReleased(bool $released): void
    {
        $this->released = $released;
    }

    /**
     * @return string|null
     */
    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    /**
     * @param string|null $releaseDate
     */
    public function setReleaseDate(?string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId(int $projectId): void
    {
        $this->projectId = $projectId;
    }

    /**
     * @return bool
     */
    public function isArchived(): bool
    {
        return $this->archived;
    }

    /**
     * @param bool $archived
     */
    public function setArchived(bool $archived): void
    {
        $this->archived = $archived;
    }



    public function toJson() : string
    {
        return json_encode($this->toArray());
    }

    public function toArray() : array
    {
        $stack = [];
        if ($this->id != null) {
            $stack['id'] = $this->id;
        }
        if ($this->description != null) {
            $stack['description'] = $this->description;
        }
        if ($this->name != null) {
            $stack['name'] = $this->name;
        }
        if ($this->released != null) {
            $stack['released'] = $this->released;
        }
        if ($this->id != null) {
            $stack['id'] = $this->id;
        }
        if ($this->releaseDate != null) {
            $stack['releaseDate'] = $this->releaseDate;
        }
        if ($this->archived != null) {
            $stack['archived'] = $this->archived;
        }
        if ($this->projectId != null) {
            $stack['projectId'] = $this->projectId;
        }
        return $stack;
    }
}