<?php


namespace Main\External\Http;

// Adapters
use Main\Adapter\Controller\Port\HttpRequest;

class LumenHttpClientRequest implements HttpRequest
{

    public function getBody($request): array
    {
        return $request->all();
    }
}
