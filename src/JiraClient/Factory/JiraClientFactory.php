<?php

namespace JiraClient\Factory;


use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;


class JiraClientFactory
{
    public static function createService(ContainerInterface $container) : void
    {
        $client = new Client([
            'headers' => [
                'Authorization' => 'Basic xxtokenxx',
                'Content-Type' => 'application/json',
                'Accept' => '*/*',
                'X-Atlassian-Token' => 'no-check'
            ],
            'base_uri' => 'https://jira.xxx.net/rest/api/2/',
            'curl' => [
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_VERBOSE => false,
                CURLOPT_ENCODING => ''
            ],
            'verify' => false,
            "debug" => true
        ]);

        $container[self::class] = $client;
    }
}