Jira Api Php Client
===============

Installation
------

The prefered way to install this client

```
php composer.phar require hcelebi/jira-php-client
```
or
```
composer require hcelebi/jira-php-client
```


Configuration
----
Dependency injection is exist in project, add these factories to configuration.
```
JiraClientFactory.php
VersionServiceFactory.php
```

Dependency injection doesn't exist in project, add this code block to application entry point
```
$container = new Container();
JiraClientFactory::createService($container);
VersionServiceFactory::createService($container);
```

