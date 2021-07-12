<?php

namespace App\Http\Controllers;

// External
use External\Framework\Lumen\adapters\Encrypt\LumenEncryptData;
use External\Framework\Lumen\adapters\Http\LumenHttpClientRequest;
use External\Framework\Lumen\adapters\Http\LumenHttpClientResponse;
use External\Framework\Lumen\adapters\Repository\LumenQueryBuilderUserRepository;
use Illuminate\Http\Request;
use Adapter\Repository\DatabaseUserRepository;

// Ports
use Adapter\Controller\Port\HttpRequest;
use Adapter\Controller\Port\HttpResponse;
use Usecase\Port\EncryptData;
use Usecase\Port\UserRepository;

// Controllers
use Adapter\Controller\RegisterUserController;


class UserController extends Controller
{
    private HttpRequest $lumenHttpClientRequest;
    private HttpResponse $lumenHttpClientResponse;
    private UserRepository $databaseUserRepository;
    private EncryptData $lumenEncryptData;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lumenHttpClientRequest = new LumenHttpClientRequest();
        $this->lumenHttpClientResponse = new LumenHttpClientResponse();
        $this->databaseUserRepository = new DatabaseUserRepository(new LumenQueryBuilderUserRepository());
        $this->lumenEncryptData = new LumenEncryptData();
    }

    public function register(Request $request)
    {

        $registerUserController = new RegisterUserController($this->lumenEncryptData,
            $this->databaseUserRepository,
            $this->lumenHttpClientRequest,
            $this->lumenHttpClientResponse);
        return $registerUserController->handle($request);
    }
}
