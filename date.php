<?php

$data = [];

for ($m = 1; $m <= 12; ++$m) {
    $data[] = date('M', mktime(0, 0, 0, $m, 1));
}

var_dump($data);
