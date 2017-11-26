#!/usr/bin/env php
<?php

require_once 'bootstrap.php';

$bugId = $argv[1];

$bug = $entityManager->find('Partyschaum\Bugtracker\Bug', (int) $bugId);

echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";
