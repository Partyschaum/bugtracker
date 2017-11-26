#!/usr/bin/env php
<?php

use Partyschaum\Bugtracker\BugRepository;

require_once "bootstrap.php";

/** @var BugRepository $bugRepository */
$bugRepository = $entityManager->getRepository('Partyschaum\Bugtracker\Bug');
$bugs = $bugRepository->getRecentBugs();

foreach ($bugs as $bug) {
    echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.Y')."\n";
    echo "    Reported by: ".$bug->getReporter()->getName()."\n";
    echo "    Assigned to: ".$bug->getEngineer()->getName()."\n";
    foreach ($bug->getProducts() as $product) {
        echo "    Platform: ".$product->getName()."\n";
    }
    echo "\n";
}
