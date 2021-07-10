<?php


namespace Main\Adapter\Controllers;


// Ports
use Main\Usecase\Port\EncryptData;
use Main\Usecase\Port\UserRepository;

// Domains
use Main\Domain\User;

//Usecases
use Main\Usecase\AddUserToRepository;

// Adapters
use Main\Adapter\Controllers\Port\HttpRequest;
use Main\Adapter\Controllers\Port\HttpResponse;

class RegisterUserController
{
    public EncryptData $encryptData;
    public UserRepository $userRepository;
    public HttpRequest $httpRequest;
    public HttpResponse $httpResponse;

    public function __construct(EncryptData $encryptData, UserRepository $userRepository, HttpRequest $httpRequest, HttpResponse $httpResponse)
    {
        $this->encryptData = $encryptData;
        $this->userRepository = $userRepository;
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $httpResponse;
    }

    public function handle($request): object
    {
        $userData = $this->httpRequest->getBody($request);

        $user = new User($userData['name'], $userData['password']);
        $addUserUsecase = new AddUserToRepository($this->encryptData, $this->userRepository, $user);
        $addUserUsecase->addUserToRepository();

        return $this->httpResponse->sendOk();
    }
}
