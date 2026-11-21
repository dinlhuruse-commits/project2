<?php
/* пример: chain */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:chain', array('n' => 3));
var_dump($store->get('example:chain'));
