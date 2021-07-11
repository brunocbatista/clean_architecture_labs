<?php


namespace Main\External\Repository;

// Usecases
use Main\Adapter\Repository\Port\Database;

// Infra
use Illuminate\Support\Facades\DB;

class LumenQueryBuilderUserRepository implements Database
{

    public function add(array $userData): void
    {
        DB::table('users')->insert($userData);
    }
}
