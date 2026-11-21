<?php
/* пример: basic */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:basic', array('n' => 1));
var_dump($store->get('example:basic'));
