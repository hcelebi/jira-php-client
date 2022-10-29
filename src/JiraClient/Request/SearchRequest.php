<?php

namespace JiraClient\Request;

class SearchRequest {
    private string $jql;

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
}
