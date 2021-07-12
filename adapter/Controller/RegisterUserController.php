<?php


namespace Adapter\Controller;


// Ports
use Usecase\Port\EncryptData;
use Usecase\Port\UserRepository;

// Domains
use Domain\User;

//Usecases
use Usecase\AddUserToRepository;

// Adapters
use Adapter\Controller\Port\HttpRequest;
use Adapter\Controller\Port\HttpResponse;

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
