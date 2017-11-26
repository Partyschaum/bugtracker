#!/usr/bin/env php
<?php

use Partyschaum\Bugtracker\User;

require_once 'bootstrap.php';

$newUsername = $argv[1];

$user = new User();
$user->setName($newUsername);

$entityManager->persist($user);
$entityManager->flush();

echo 'Created User with ID ' . $user->getId() . "\n";
