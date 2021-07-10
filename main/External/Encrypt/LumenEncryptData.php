<?php


namespace Main\External\Encrypt;

// Adapters
use Main\Usecase\Port\EncryptData;

// Infra
use Illuminate\Support\Facades\Hash;

class LumenEncryptData implements EncryptData
{

    public function encrypt($data): string
    {
        return Hash::make($data);
    }
}
