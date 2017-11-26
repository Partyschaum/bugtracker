#!/usr/bin/env php
<?php

use Partyschaum\Bugtracker\Bug;

require_once 'bootstrap.php';

$userId = $argv[1];

$dql = 'SELECT b, e, r FROM Partyschaum\Bugtracker\Bug b JOIN b.engineer e JOIN b.reporter r ' .
    "WHERE b.status = 'OPEN' AND (e.id = ?1 OR r.id = ?1) ORDER BY b.created DESC";

/** @var Bug[] $myBugs */
$myBugs = $entityManager->createQuery($dql)
    ->setParameter(1, $userId)
    ->setMaxResults(15)
    ->getResult();

echo "You have created or assigned to " . count($myBugs) . " open bugs:\n\n";

foreach ($myBugs as $bug) {
    echo $bug->getId() . " - " . $bug->getDescription() . " - Assignee: " . $bug->getEngineer()->getName() . "\n";
}
