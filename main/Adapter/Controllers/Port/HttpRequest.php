<?php


namespace Main\Adapter\Controllers\Port;


interface HttpRequest
{
    public function getBody($request): array;
}
