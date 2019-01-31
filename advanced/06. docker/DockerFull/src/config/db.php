<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=db;dbname=yii2db',
    'username' => 'postgres',
    'password' => 'secret',
    'charset' => 'utf8',

    // Ещё можно/нужно использовать getenv('PHP_POSTGRES_USER') для считывания извне

    'attributes' => [
        PDO::PGSQL_ATTR_DISABLE_PREPARES => true,
    ],

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
