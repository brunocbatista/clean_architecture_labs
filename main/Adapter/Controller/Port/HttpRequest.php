<?php


namespace Main\Adapter\Controller\Port;


interface HttpRequest
{
    public function getBody($request): array;
}
