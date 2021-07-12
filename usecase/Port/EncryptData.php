<?php


namespace Usecase\Port;


interface EncryptData
{
    public function encrypt($data): string;
}
