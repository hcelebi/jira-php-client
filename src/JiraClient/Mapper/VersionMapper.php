<?php

namespace JiraClient\Mapper;

use JiraClient\Dto\Version;

class VersionMapper
{
    public static function map(\stdClass $responseData) : Version
    {
        $version = new Version();
        $version->setId($responseData->id);
        $version->setName($responseData->name);
        if (isset($responseData->description)) {
            $version->setDescription($responseData->description);
        }
        if (isset($responseData->released)) {
            $version->setReleased($responseData->released);
        }
        if (isset($responseData->releaseDate)) {
            $version->setReleaseDate($responseData->releaseDate);
        }
        if (isset($responseData->archived)) {
            $version->setArchived($responseData->archived);
        }
        $version->setProjectId($responseData->projectId);
        return $version;
    }
}