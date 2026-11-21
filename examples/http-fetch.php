<?php
/* пример: http-fetch */
require __DIR__ . '/../bootstrap.php';

$store = new Store(__DIR__ . '/../var/cache', 600);
$store->set('example:http-fetch', array('n' => 8));
var_dump($store->get('example:http-fetch'));
