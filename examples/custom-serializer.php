<?php
/* пример: custom-serializer */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:custom-serializer', array('n' => 4));
var_dump($store->get('example:custom-serializer'));
