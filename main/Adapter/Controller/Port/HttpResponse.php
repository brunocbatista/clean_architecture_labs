<?php


namespace Main\Adapter\Controller\Port;


interface HttpResponse
{
    public function sendOk(): object;

    public function sendData($responseData): object;

    public function sendError($code, $message): object;
}
