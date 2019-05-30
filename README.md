## PHP ServiceNow Client

A basic package built on Guzzle's Services libraries.  This offers the following method calls:

* listRecords($table, $parameters)
* createRecord($table, $parameters)
* getRecord($table, $sysId, $parameters)
* updateRecord($table, $sysId, $parameters)
* deleteRecord($table, $sysId);

### Installation

```bash
$ composer require goodwillaz/servicenow
```

An OAuth client is required to be set up in ServiceNow before utilizing this client.

### Usage

```php
use ServiceNow\ClientFactory;

$instance = 'foo';
$auth = [
    'client_id' => 'oauth-client-id-from-servicenow',
    'client_secret' => 'oauth-secret-from-servicenow',
    'username' => 'api-username',
    'password' => 'api-user-password'
];

$client = new ClientFactory($instance, $auth);

vardump($client->listRecords('incident'));
```
