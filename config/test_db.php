<?php
// $db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
// $db['dsn'] = 'mysql:host=localhost;dbname=yii2basic_test';
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=projectyii_test',
    'username' => 'projectyii',
    'password' => 'projectyii',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
// return $db;