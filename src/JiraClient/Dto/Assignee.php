<?php

namespace JiraClient\Dto;

class Assignee
{
    /** @var string */
    private string $displayName;

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName(string $displayName): void
    {
        $this->displayName = $displayName;
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