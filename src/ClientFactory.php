<?php

namespace ServiceNow;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\DescriptionInterface;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\GrantType\PasswordCredentials;
use kamermans\OAuth2\OAuth2Middleware;

class ClientFactory
{
    /**
     * @param $instance
     * @param $authConfig
     * @return Client
     */
    public function make($instance, $authConfig)
    {
        $oauth = new OAuth2Middleware($this->createPasswordAuth($instance, $authConfig));
        $handlerStack = HandlerStack::create();
        $handlerStack->push($oauth);

        $guzzleClient = new GuzzleClient([
            'auth' => 'oauth',
            'handler' => $handlerStack,
        ]);

        return new Client($guzzleClient, $this->buildDescription($instance));
    }

    protected function createPasswordAuth($instance, array $config)
    {
        return new PasswordCredentials(
            new GuzzleClient(['base_uri' => "https://{$instance}.service-now.com/oauth_token.do"]),
            $config
        );
    }

    /**
     * @param string $instance
     * @return DescriptionInterface
     */
    protected function buildDescription($instance)
    {
        $description = \GuzzleHttp\json_decode(file_get_contents(__DIR__ . '/../servicenow.json'), true);
        $description['baseUri'] = "https://{$instance}.service-now.com/api/now/";

        return new Description($description);
    }
}
