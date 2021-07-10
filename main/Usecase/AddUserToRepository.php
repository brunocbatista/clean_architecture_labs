<?php


namespace Main\Usecase;

// Domains
use Main\Domain\User;

// Ports
use Main\Usecase\Port\EncryptData;
use Main\Usecase\Port\UserRepository;

class AddUserToRepository
{
    private EncryptData $encryptData;
    private UserRepository $userRepository;
    private User $user;

    public function __construct(EncryptData $encryptData, UserRepository $userRepository, User $user)
    {
        $this->encryptData = $encryptData;
        $this->userRepository = $userRepository;
        $this->user = $user;
    }

    public function addUserToRepository(): void
    {
        $this->user->setPassword($this->encryptData->encrypt($this->user->getPassword()));
        $this->userRepository->add($this->user->toArray());
    }
}
