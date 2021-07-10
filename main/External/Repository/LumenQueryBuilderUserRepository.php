<?php


namespace Main\External\Repository;

// Usecases
use Main\Usecase\Port\UserRepository;

// Infra
use Illuminate\Support\Facades\DB;

class LumenQueryBuilderUserRepository implements UserRepository
{

    public function add(array $userData): void
    {
        DB::table('users')->insert($userData);
    }
}
