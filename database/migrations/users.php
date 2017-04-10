<?php

use Framework\DB;

include __DIR__.'/../../bootstrap/app.php';

$queries = [
    'users' =>
        'CREATE TABLE `users` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(255) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
];

foreach ($queries as $query) {
    DB::getInstance()->query($query);
}
