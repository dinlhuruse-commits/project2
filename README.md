# cache-store

Файловый кеш с ttl, локом на запись и крошечным http-клиентом.

```php
require __DIR__ . '/bootstrap.php';

$store = new Store(__DIR__ . '/var/cache', 600);
$store->set('page:42', array('title' => 'hi'));
var_dump($store->get('page:42'));
```

## раскладка

* `src/` — классы;
* `docs/` — разбор по темам;
* `var/cache/` — записи, создаются во время работы;
* `bench/` — замеры.



## ttl

Значение живёт не дольше ttl в секундах; часы передаются снаружи,
поэтому поведение проверяется в тестах без `sleep`.
