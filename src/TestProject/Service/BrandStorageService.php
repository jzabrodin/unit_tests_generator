<?php

namespace App\TestProject\Service;

class BrandStorageService
{
    public function getById(int $id): array
    {
        return [
            $id => ['data']
        ];
    }

}