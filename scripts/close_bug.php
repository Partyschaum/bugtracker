#!/usr/bin/env php
<?php

use Partyschaum\Bugtracker\Bug;

require_once 'bootstrap.php';

$bugId = $argv[1];

/** @var Bug $bug */
$bug = $entityManager->find("Partyschaum\Bugtracker\Bug", (int)$bugId);
$bug->close();

$entityManager->persist($bug);
$entityManager->flush();

echo "Closed bug #" . $bug->getId() . " - " . $bug->getDescription() . PHP_EOL;
