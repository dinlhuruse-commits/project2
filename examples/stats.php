<?php
/* пример: stats */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:stats', array('n' => 7));
var_dump($store->get('example:stats'));
