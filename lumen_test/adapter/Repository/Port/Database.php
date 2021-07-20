<?php


namespace Adapter\Repository\Port;


interface Database
{
    public function add(array $data): void;
}
