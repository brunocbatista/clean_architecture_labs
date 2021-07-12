<?php


namespace External\Framework\Lumen\adapters\Http;

// Adapters
use Adapter\Controller\Port\HttpRequest;

class LumenHttpClientRequest implements HttpRequest
{

    public function getBody($request): array
    {
        return $request->all();
    }
}
