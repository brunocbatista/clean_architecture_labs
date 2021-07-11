<?php


namespace Main\Adapter\Controller;


// Ports
use Main\Usecase\Port\EncryptData;
use Main\Usecase\Port\UserRepository;

// Domains
use Main\Domain\User;

//Usecases
use Main\Usecase\AddUserToRepository;

// Adapters
use Main\Adapter\Controller\Port\HttpRequest;
use Main\Adapter\Controller\Port\HttpResponse;

class RegisterUserController
{
    private EncryptData $encryptData;
    private UserRepository $userRepository;
    private HttpRequest $httpRequest;
    private HttpResponse $httpResponse;

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
