#!/usr/bin/env php
<?php

require_once 'bootstrap.php';

$id = $argv[1];
$newName = $argv[2];

$product = $entityManager->find('Partyschaum\Bugtracker\Product', $id);

if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$product->setName($newName);

$entityManager->flush();
