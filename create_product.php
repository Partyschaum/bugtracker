<?php

require_once 'bootstrap.php';

use Partyschaum\Bugtracker\Product;

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
