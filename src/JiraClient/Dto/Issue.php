<?php

namespace JiraClient\Dto;

class Issue
{
    /** @var int */
    private $id;
    /** @var string */
    private $key;
    /** @var Fields */
    private $fields;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

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
     * @return Fields
     */
    public function getFields(): Fields
    {
        return $this->fields;
    }

    /**
     * @param Fields $fields
     */
    public function setFields(Fields $fields): void
    {
        $this->fields = $fields;
    }

    public function toJson() : string
    {
        return json_encode($this->toArray());
    }


    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'fields' => $this->fields->toArray()
        ];
    }
}