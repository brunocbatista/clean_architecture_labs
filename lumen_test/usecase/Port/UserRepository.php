<?php


namespace Usecase\Port;


interface UserRepository
{
    public function add(array $user): void;
}
