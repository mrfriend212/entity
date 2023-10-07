<?php

require_once 'vendor/autoload.php';

require_once 'bootstrap.php';

[$filename, $username, $password] = $argv;

$user = new \App\Entity\User();

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$user->setUsername($username);
$user->setPassword($hashedPassword);

/** @var \Doctrine\ORM\EntityManager $em */
$em = $entityManager;

$em->persist($user);
$em->flush();

echo "Created user eith id ". $user->getId();