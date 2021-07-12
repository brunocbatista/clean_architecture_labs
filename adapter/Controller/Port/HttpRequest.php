<?php


namespace Adapter\Controller\Port;


interface HttpRequest
{
    public function getBody($request): array;
}
