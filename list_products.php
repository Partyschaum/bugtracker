<?php

use Partyschaum\Bugtracker\Product;

require_once 'bootstrap.php';

$productRepository = $entityManager->getRepository('Partyschaum\Bugtracker\Product');

/** @var Product[] $products */
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo sprintf("id: %d name: %s\n", $product->getId(), $product->getName());
}
