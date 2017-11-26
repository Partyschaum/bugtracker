#!/usr/bin/env php
<?php

// create_bug.php <reporter-id> <engineer-id> <product-ids>

use Partyschaum\Bugtracker\Bug;

require_once 'bootstrap.php';

$reporterId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(",", $argv[3]);

/** @var \Partyschaum\Bugtracker\User $reporter */
$reporter = $entityManager->find('Partyschaum\Bugtracker\User', $reporterId);

/** @var \Partyschaum\Bugtracker\User $engineer */
$engineer = $entityManager->find('Partyschaum\Bugtracker\User', $engineerId);
if (!$reporter || !$engineer) {
    echo "No reporter and/or engineer found for the given id(s).\n";
    exit(1);
}

$bug = new Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime("now"));
$bug->setStatus("OPEN");

foreach ($productIds as $productId) {
    /** @var \Partyschaum\Bugtracker\Product $product */
    $product = $entityManager->find('Partyschaum\Bugtracker\Product', $productId);
    $bug->assignedToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo 'Your new Bug Id: '.$bug->getId()."\n";
