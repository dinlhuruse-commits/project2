<?php
/* пример: ttl */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:ttl', array('n' => 2));
var_dump($store->get('example:ttl'));
