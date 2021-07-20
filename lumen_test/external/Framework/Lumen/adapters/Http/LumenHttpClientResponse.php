<?php


namespace External\Framework\Lumen\adapters\Http;

// Adapters
use Adapter\Controller\Port\HttpResponse;
use Symfony\Component\HttpFoundation\Response as codes;

class LumenHttpClientResponse implements HttpResponse
{

    public function sendOk(): object
    {
        return response()->json();
    }

    public function sendData($responseData): object
    {
        return response()->json($responseData, codes::HTTP_OK);
    }

    public function sendError($code, $message): object
    {
        return response()->json($message, $code);
    }
}
