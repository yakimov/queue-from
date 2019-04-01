# queue-from
Создание и использование простых очередей из генератора, итератора диретории или массива.

## Установка
`composer require s25/queue-from`

## Пример использования
`php test/test.php`
```PHP
<?php

require __DIR__.'/../vendor/autoload.php';

use S25\Queue\Queue;

$key    = 'test';
$path   = './';
$queue  = new Queue($key);

// Заполнить очередь строками из массива
$queue->getGenerator([1,2,3,4,5,6,7,8,9,10])->generate();
while ($item = $queue->pop())
{
    echo $item;
}

// Заполнить очередь списком файлов
$queue->getGenerator(new \DirectoryIterator($path))->generate();
while ($item = $queue->pop())
{
    echo $item;
}

// Продолжение следует...

```
