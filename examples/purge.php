<?php
/* пример: purge */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:purge', array('n' => 5));
var_dump($store->get('example:purge'));
