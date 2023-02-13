<?php

namespace App\TestProject\Service;

use App\TestProject\Entity\Role;
use App\TestProject\Entity\User;

class UserAuthenticationService
{
    public function isAbleToChangeBrand(): bool
    {
        return true;
    }

    public function isAbleToChangeCollection(): bool
    {
        return $this->getCurrentUser()->getRole() === Role::ROLE_ADMIN;
    }

    public function getCurrentUser(): User
    {
        return new User('Vasyl', Role::ROLE_ADMIN, 1);
    }
}