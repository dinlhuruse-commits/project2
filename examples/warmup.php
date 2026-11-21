<?php
/* пример: warmup */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:warmup', array('n' => 6));
var_dump($store->get('example:warmup'));
