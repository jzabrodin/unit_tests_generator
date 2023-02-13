<?php

namespace App\TestProject\Service;

class CollectionStorageService
{
    public function getCollectionByName(string $name):array{
     return [
         $name => [
             'name' => $name,
             'id' => 100
         ]
     ];
    }
}