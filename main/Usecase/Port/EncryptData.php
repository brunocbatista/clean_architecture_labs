<?php


namespace Main\Usecase\Port;


interface EncryptData
{
    public function encrypt($data): string;
}
