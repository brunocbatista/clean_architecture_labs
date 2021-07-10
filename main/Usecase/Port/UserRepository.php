<?php


namespace Main\Usecase\Port;


interface UserRepository
{
    public function add(array $user): void;
}
