<?php

namespace App\Http\Controllers;

// External
use Illuminate\Http\Request;
use Main\Adapter\Repository\DatabaseUserRepository;
use Main\External\Encrypt\LumenEncryptData;
use Main\External\Http\LumenHttpClientRequest;
use Main\External\Http\LumenHttpClientResponse;

// Ports
use Main\Adapter\Controller\Port\HttpRequest;
use Main\Adapter\Controller\Port\HttpResponse;
use Main\External\Repository\LumenQueryBuilderUserRepository;
use Main\Usecase\Port\EncryptData;
use Main\Usecase\Port\UserRepository;

// Controllers
use Main\Adapter\Controller\RegisterUserController;


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
