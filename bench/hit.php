<?php
/* попадания: один и тот же ключ сто раз */
require __DIR__ . '/../bootstrap.php';
$s = new Store(sys_get_temp_dir() . '/bench', 60);
$s->set('hot', 1);
$t = microtime(true);
for ($i = 0; $i < 1000; $i++) { $s->get('hot'); }
printf("get: %.3f s\n", microtime(true) - $t);
