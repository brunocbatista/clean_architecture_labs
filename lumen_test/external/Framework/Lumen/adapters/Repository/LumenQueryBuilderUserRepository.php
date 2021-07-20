<?php


namespace External\Framework\Lumen\adapters\Repository;

// Usecases
use Adapter\Repository\Port\Database;

// Infra
use Illuminate\Support\Facades\DB;

class LumenQueryBuilderUserRepository implements Database
{

    public function add(array $userData): void
    {
        DB::table('users')->insert($userData);
    }
}
