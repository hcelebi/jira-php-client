<?php

namespace JiraClient\Dto;

class Status
{
    private string $name;
    private int $id;
    

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}


	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 */
	public function setId(int $id): void {
		$this->id = $id;
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