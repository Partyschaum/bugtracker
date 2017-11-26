#!/usr/bin/env php
<?php

require_once 'bootstrap.php';

$id = $argv[1];
$product = $entityManager->find('Partyschaum\Bugtracker\Product', (int) $id);

if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("id: %d name: %s\n", $product->getId(), $product->getName());
