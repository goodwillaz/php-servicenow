<?php

namespace ServiceNow;

use GuzzleHttp\Command\Guzzle\GuzzleClient as GuzzleCommandClient;
use GuzzleHttp\Command\Result;

class Client extends GuzzleCommandClient
{
    /**
     * @param string $table
     * @param array $parameters
     * @return Result
     */
    public function listRecords($table, array $parameters = [])
    {
        $args = compact('table') + $parameters;

        return parent::listRecords($args);
    }

    /**
     * @param string $table
     * @param array $parameters
     * @return Result
     */
    public function createRecord($table, array $parameters = [])
    {
        $args = compact('table') + $parameters;

        return parent::createRecord($args);
    }

    /**
     * @param string $table
     * @param string $sysId
     * @param array $parameters
     * @return Result
     */
    public function getRecord($table, $sysId, array $parameters = [])
    {
        $args = compact('table', 'sysId') + $parameters;

        return parent::getRecord($args);
    }

    /**
     * @param string $table
     * @param string $sysId
     * @param array $parameters
     * @return Result
     */
    public function updateRecord($table, $sysId, array $parameters = [])
    {
        $args = compact('table', 'sysId') + $parameters;

        return parent::updateRecord($args);
    }

    /**
     * @param string $table
     * @param string $sysId
     * @return Result
     */
    public function deleteRecord($table, $sysId)
    {
        $args = compact('table', 'sysId');

        return parent::updateRecord($args);
    }
}
