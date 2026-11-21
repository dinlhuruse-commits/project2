<?php
/* холодный прогон: пишем 500 ключей и читаем их обратно */
require __DIR__ . '/../bootstrap.php';
$s = new Store(sys_get_temp_dir() . '/bench', 60);
$t = microtime(true);
for ($i = 0; $i < 500; $i++) { $s->set('b' . $i, $i); }
printf("set: %.3f s\n", microtime(true) - $t);
