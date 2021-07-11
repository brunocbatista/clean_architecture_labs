<?php


namespace Main\Adapter\Repository;


use Main\Adapter\Repository\Port\Database;
use Main\Usecase\Port\UserRepository;

class DatabaseUserRepository implements UserRepository
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function add(array $user): void
    {
        $this->database->add($user);
    }
}
